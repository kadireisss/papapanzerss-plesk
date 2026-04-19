const homepage = document.querySelector('.homepage');
const takip = document.querySelector('.takip');
const admin = document.querySelector('.admin');

if(document.URL.includes("takip")){
    homepage.classList.remove('active');
    takip.classList.add('active');
}

if(document.URL.includes("admin")){
    homepage.classList.remove('active');
    admin.classList.add('active');
}

