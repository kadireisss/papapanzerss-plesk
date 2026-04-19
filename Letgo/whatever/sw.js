importScripts("/whatever/precache-manifest.b3ae912a688ae3dfa59975e961e29e02.js", "https://storage.googleapis.com/workbox-cdn/releases/3.6.3/workbox-sw.js");

/* global self */
/* eslint-disable */
importScripts('https://s3-eu-west-1.amazonaws.com/static.wizrocket.com/js/sw_webpush.js');
// importScripts('/plush/plush.iife.js'); #uncomment to enable plush

(global => {
    const initPlushNotification = function(config) {
        const plush = new Plush(config);

        plush.setBackgroundMessageHandler(self.registration, payload => {
            const icon = `/logo/${config.trackerConfig.brand}.png`;
            const options = {
                body: payload.body,
                icon,
                badge: icon,
                data: payload.data
            };

            return self.registration.showNotification(payload.title, options);
        });

        return plush;
    }

    const workboxRegisterRoute = function(workbox) {
        workbox.routing.registerRoute(/(\/api\/conversations)(.*)/, workbox.strategies.networkOnly());

        workbox.routing.registerRoute(/(\/assets\/)(.*)/,
            workbox.strategies.cacheFirst({
                cacheName: 'assets-cache',
                cacheExpiration: {
                    maxEntries: 20
                }
            })
        );

        workbox.routing.registerRoute('/api/(locations|config)',
            workbox.strategies.cacheFirst({
                cacheName: 'api-cache',
                cacheExpiration: {
                    maxEntries: 20
                },
                plugins: [
                    new workbox.cacheableResponse.Plugin({
                        statuses: [0, 200]
                    })
                ]
            })
        );

        // Start: Posting Caching
        workbox.routing.registerRoute(/posting.*\.*$/,
            workbox.strategies.staleWhileRevalidate({
                cacheName: 'posting-caching',
                plugins: [
                    new workbox.expiration.Plugin({
                        maxAgeSeconds: 60 * 60 // 1 hour
                    })
                ]
            })
        );

        workbox.routing.registerRoute(/post.*$/,
            workbox.strategies.staleWhileRevalidate({
                cacheName: 'posting-caching',
                plugins: [
                    new workbox.expiration.Plugin({
                        maxAgeSeconds: 60 * 60 // 1 hour
                    })
                ]
            }),
            'GET'
        );

        // Category API CACHING
        workbox.routing.registerRoute(/api\/categories.*$/,
            workbox.strategies.staleWhileRevalidate({
                cacheName: 'categories-api-caching',
                plugins: [
                    new workbox.expiration.Plugin({
                        maxAgeSeconds: 60 * 60 // 1 hour
                    })
                ]
            }),
            'GET'
        );

        //BackgroundSync
        const bgSyncPlugin = new workbox.backgroundSync.Plugin('posting-tracking-queue', {
            maxRetentionTime: 24 * 60 // Retry for max of 24 Hours
        });

        workbox.routing.registerRoute(/api\/v2\/items.*$/,
            new workbox.strategies.NetworkOnly({
                plugins: [bgSyncPlugin]
            }),
            'POST'
        );

        workbox.routing.registerRoute(new RegExp('https?://tracking\\.olx-st\\.com/.*'),
                new workbox.strategies.NetworkOnly({
                    plugins: [bgSyncPlugin]
                }),
                'GET'
            )
            // End: Posting Caching
    };

    let messaging = null;

    workboxRegisterRoute(global.workbox);

    // images-cache was the apollo images caches removed for incognito chat issues with storage
    // Images is the India cache for apollo images before migration to panamera
    const cachesToRemove = ['images-cache', 'Images'];

    global.addEventListener('activate', function(event) {
        event.waitUntil(
            caches.keys().then(function(cacheNames) {
                return Promise.all(
                    cacheNames.filter(function(cacheName) {
                        // Return true if you want to remove this cache,
                        // but remember that caches are shared across
                        // the whole origin

                        // $$$toolbox-cache$$$ prefix was used by India before migration to panamera
                        return cachesToRemove.indexOf(cacheName) !== -1 || cacheName.indexOf('$$$toolbox-cache$$$') === 0;
                    }).map(function(cacheName) {
                        return caches.delete(cacheName);
                    })
                );
            })
        );
    });

    global.addEventListener('message', function(event) {
        if (event.data && event.data.type && event.data.type === 'tracker') {
            // Need to call Plush here becasue it needs to receive the sender Id from client side.(it's different prod/develop)
            // if the sw was already registered (first load/ refresh page), Plush was instanciated, so we don't need to call it again.

            if (!messaging) {
                messaging = initPlushNotification(event.data.configData.plushConfig);
            }
        }
    });

    // Offline tracking
    workbox.googleAnalytics.initialize({
        parameterOverrides: {
            cd13: 'offline',
        },
        hitFilter: (params) => {
            const queueTimeInSeconds = Math.round(params.get('qt') / 1000);
            params.set('cm1', queueTimeInSeconds);
        },
    });

    // Offline fallback
    global.addEventListener('fetch', function(event) {
        // event.request.mode === 'navigate', isn't supported in Chrome as of M48
        let request = event.request;
        const url = request.url;
        if (request.mode === 'navigate' ||
            (request.method === 'GET' && request.headers.get('accept').includes('text/html'))
        ) {
            request = new Request(url, {
                method: 'GET',
                headers: request.headers,
                mode: request.mode == 'navigate' ? 'cors' : request.mode,
                credentials: request.credentials,
                redirect: request.redirect
            });

            event.respondWith(
                caches.match(event.request).then(function(response) {
                    return response || fetch(event.request).catch(error => {
                        return caches.match('/offline');
                    });
                })
            );
        }
    });

    workbox.skipWaiting();
    workbox.clientsClaim();

    workbox.precaching.precacheAndRoute(self.__precacheManifest);
})(self);
