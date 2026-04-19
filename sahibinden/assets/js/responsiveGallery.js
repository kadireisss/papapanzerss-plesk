photoArr.forEach((item, index)=> {
    document.querySelector('.galleryHead .swiper-wrapper').innerHTML +='<div class="swiper-slide" aria-label=' +`${index+1}/${photoArr.length}`+'><img src="" alt=""></div>';
});

photoArr.forEach(()=> document.querySelector('.carousel-container .swiper-wrapper').innerHTML +=`<div class="swiper-slide" ><img src="" alt="" ></div>`);
const mobileGallery=document.querySelectorAll('.galleryHead .swiper-wrapper div');
const mobileGallery2=document.querySelectorAll('.carousel-container .swiper-wrapper div');

for (let i=0; i < mobileGallery.length; i++) {
    mobileGallery[i].firstElementChild.src=photoArr[i];
    mobileGallery[i].firstElementChild.alt=`photo-${i + 1}`;
}

for (let i=0; i < mobileGallery2.length; i++) {
    mobileGallery2[i].firstElementChild.src=photoArr[i];
    mobileGallery2[i].firstElementChild.alt=`photo-${i + 1}`;
}

document.querySelector('.galleryHead .arrCount').textContent=photoArr.length;
document.querySelector('.carousel-holder .arrCount2').textContent=photoArr.length;

document.addEventListener('DOMContentLoaded', ()=> {
    let active = document.querySelectorAll('.galleryHead .swiper-wrapper div');
    let active2 = document.querySelectorAll('.carousel-container .swiper-wrapper div');
    const ELS_test = active;
    const ELS_test2 = active2;
    const attrObserver = new MutationObserver((mutations)=> {
            mutations.forEach(mu=> {
            if (mu.type !=="attributes" && mu.attributeName !=="class") return;
            if(mu.target.classList.contains('swiper-slide-active')) {
                if(mu.target.closest('.galleryHead')) {
                    document.querySelector('.countBind').textContent=`${mu.target.ariaLabel}`;
                }

                if(mu.target.closest('.carousel-container')) {
                    document.querySelector('.countBind2').textContent=`${mu.target.ariaLabel}`;
                }
            }
        });
    });

    ELS_test.forEach(el=> attrObserver.observe(el, {attributes: true}));
    ELS_test2.forEach(el=> attrObserver.observe(el, {attributes: true}));
    document.querySelectorAll('.carousel-container .swiper-slide').forEach((item)=> {
        item.addEventListener('click', () => {
            document.querySelector('.galleryHead').style.display='block';
        });
    });
});

document.querySelector('.galleryHead .closeBtnResponsive').addEventListener('click', ()=> {
    document.querySelector('.galleryHead').style.display='none';
});

document.querySelector('.responsiveDetBtn2').addEventListener('click', function (){
    document.querySelector('.respTab .active-tab').classList.remove('active-tab');
    this.classList.toggle('active-tab');
    document.querySelector('.info-section').style.display = 'none';
    document.querySelector('.respDetClass').style.display = 'block';
})

document.querySelector('.responsiveDetBtn').addEventListener('click', function (){ 
    document.querySelector('.respTab .active-tab').classList.remove('active-tab');
    this.classList.toggle('active-tab');
    document.querySelector('.info-section').style.display = 'block';
    document.querySelector('.respDetClass').style.display = 'none';
})