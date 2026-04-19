const galleryCount = document.querySelectorAll('.classifiedDetailThumbList li');
const bigGalleryCount = document.querySelectorAll('.classifiedDetailMainPhoto label');
const bigGalleryCountInput = document.querySelectorAll('.classifiedDetailMainPhoto input');
const bigGalleryPhoto = document.querySelector('.mega-photo-img');
const bigGalleryLeft = document.querySelector('.megaPhotoLeft');
const bigGalleryRight = document.querySelector('.megaPhotoRight');
var count = 0;

let countIncrease = () => count++;
let countDecrease = () => count--;

let resetFn = () => {
    (count > (photoArr.length - 1)) ? ((count = 0), document.querySelector('.current-mega-image').textContent = `${count + 1}`) : count;
    (count < 0) ? ((count = 0), document.querySelector('.current-mega-image').textContent = `${count + 1}`) : count;
};

let prevFn = function() {
    countDecrease();
    if(!(count > (photoArr.length - 1)) && !(count < 0)) {
        bigGalleryPhoto.lastElementChild.src = '';
        bigGalleryPhoto.lastElementChild.src =  photoArr[count];
        document.querySelector('.current-mega-image').textContent = `${count + 1}`;
    } else {
        resetFn();
        bigGalleryPhoto.lastElementChild.src = `${photoArr[0]}`;
    }
    resetFn();
};

let nextFn = function() {
    countIncrease();
    if(!(count > (photoArr.length - 1)) && !(count < 0)) {
        bigGalleryPhoto.lastElementChild.src = '';
        bigGalleryPhoto.lastElementChild.src =  photoArr[count];
        document.querySelector('.current-mega-image').textContent = `${count + 1}`;
    } else {
        resetFn();
        bigGalleryPhoto.lastElementChild.src = `${photoArr[0]}`;
    }
    resetFn();
};

bigGalleryPhoto.lastElementChild.src = `${photoArr[0]}`;
document.querySelectorAll('.current-image-count').forEach((item) => {
    item.textContent = photoArr.length;
});

if(galleryCount.length >= photoArr.length) {
    for (let i = 0; i < galleryCount.length; i++) {    
        if(i > photoArr.length - 1) {
            galleryCount[i].remove();
        }
        galleryCount[i].firstElementChild.firstElementChild.src = photoArr[i];
    }
};

if(bigGalleryCount.length >= photoArr.length) {
    for (let i = 0; i < bigGalleryCount.length; i++) {    
        if(i > photoArr.length - 1) {
            bigGalleryCount[i].remove();
            bigGalleryCountInput[i].remove();
        }
        bigGalleryCount[i].firstElementChild.src = photoArr[i];
    }
};

galleryCount.forEach((item, index) => {
    item.addEventListener('click', () => {
        document.querySelector('.current-image').textContent = index + 1;
        document.querySelector('.selected').classList.remove('selected');
        item.firstElementChild.classList.add('selected');
    });
});

document.querySelector('#mega-foto').addEventListener('click', () => {
    document.body.style.overflow = 'hidden';
    document.querySelector('.gallery-container').style.display = 'block';
});

document.querySelector('#cboxClose').addEventListener('click', () => {
    document.body.style.overflow = 'unset';
    document.querySelector('.gallery-container').style.display = 'none';
});

document.querySelector('.callBtn').addEventListener('click', () => {
    document.querySelector('.call-classified-owner').classList.add('active');
});
document.querySelector('.classified-owner-opac').addEventListener('click', () => {
    document.querySelector('.call-classified-owner').classList.remove('active');
})