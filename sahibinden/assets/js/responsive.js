document.addEventListener('DOMContentLoaded', () => {
    if (window.matchMedia('screen and (max-width: 768px)').matches) {
        let empty, Arr = [], forDeletion = ['true'];
        const addressBtn = document.querySelector('.responsiveBtn'),
            purchaseBtn = document.querySelector('.responsivePurchase'),
            completeBtn = document.querySelector('.responsiveComplete'),
            ibanCopy = document.querySelector('.ibanBtn'),
            urunBack = document.querySelector('.urunBack'),
            teslimatBackBtn = document.querySelector('.teslimatBackBtn'),
            form = document.querySelector("#container > div.set-payment-container.set-payment-active-step-1 > form");


        form.addEventListener('submit', (e) => {
            e.preventDefault();
        });

        ['input', 'click', 'change', 'focus', 'blur'].forEach((method) => {
            form.elements[2].addEventListener(method, (e) => {
                e.target.value.startsWith("+") ? e.target.value = e.target.value : e.target.value = "+90" + e.target.value;
            })
        });

        let step = (step, barWidth) => {
            //change step
            let layout = document.querySelector(`.set-payment-step-${step}-detail`);
            layout.style.display = "none";
            layout.nextElementSibling.style.display = "block";
            //change bar
            // document.styleSheets[0].addRule('.set-payment-active-step-1 .payment-progress .bar::before', `width: ${barWidth}`);
            document.querySelector('.bar').className = 'bar';
            document.querySelector('.bar').classList.add(`w${barWidth}`);
            //change ellipses
            let step1 = document.querySelector(`.step-${step}`);
            let step2 = document.querySelector(`.step-${step+1}`);
            step1.firstElementChild.classList.add('bgChange');
            step2.firstElementChild.classList.add('bgChange2');
        }
        
        ibanCopy.addEventListener('click', (e) => {
            document.querySelector(".iban-number").select();
            document.execCommand('copy');

            e.target.style.backgroundColor = "#437db9";
            e.target.textContent = "Kopyalandı"
            setTimeout(() => {
                e.target.style.backgroundColor = "#666"
                e.target.textContent = "IBAN Kopyala"
            }, 1500);
        })

        addressBtn.addEventListener('click', () => {
            step(1, "37");
        });

        purchaseBtn?.addEventListener('click', () => {
            let phoneFn = (value) => {
                const phoneExp = (reg) => /^\d{10}$/.test(reg.trim()) && reg.split('')[0] === "5";
                let splitValue = value.split(' '),
                    checkPhone = splitValue[1] + splitValue[2] + splitValue[3] + splitValue[4];
                return phoneExp(checkPhone.toString());
            }

            let nameCheck = (value) => /[a-zA-ZwığüşöçĞÜŞÖÇİ]+$/g.test(value) && value.length >= 3;

            let nameInput = form.elements[0],
                surnameInput = form.elements[1],
                phoneInput = form.elements[2],
                addressNameInput = form.elements[3],
                cityInput = form.elements[4],
                countyInput = form.elements[5],
                addressInput = form.elements[6];

            nameCheck(nameInput.value) ? (nameInput.nextElementSibling.classList.remove('errorActive'), Arr.push('true')) : (nameInput.nextElementSibling.classList.add('errorActive'), Arr = Arr.filter(item => !forDeletion.includes(item)));
            nameCheck(surnameInput.value) ? (surnameInput.nextElementSibling.classList.remove('errorActive'), Arr.push('true')) : (surnameInput.nextElementSibling.classList.add('errorActive'), Arr = Arr.filter(item => !forDeletion.includes(item)));
            phoneFn(phoneInput.value) ? (phoneInput.nextElementSibling.classList.remove('errorActive'), Arr.push('true')) : (phoneInput.nextElementSibling.classList.add('errorActive'), Arr = Arr.filter(item => !forDeletion.includes(item)));
            addressNameInput.value.length >= 2 ? (addressNameInput.nextElementSibling.classList.remove('errorActive'), Arr.push('true')) : (addressNameInput.nextElementSibling.classList.add('errorActive'), Arr = Arr.filter(item => !forDeletion.includes(item)));
            cityInput.value !== "" ? (Arr.push('true')) : (Arr = Arr.filter(item => !forDeletion.includes(item)));;
            countyInput.value !== "" ? (countyInput.nextElementSibling.classList.remove('errorActive'), Arr.push('true')) : (countyInput.nextElementSibling.classList.add('errorActive'), Arr = Arr.filter(item => !forDeletion.includes(item)));
            addressInput.value.length > 20 ? (addressInput.nextElementSibling.classList.remove('errorActive'), Arr.push('true')) : (addressInput.nextElementSibling.classList.add('errorActive'), Arr = Arr.filter(item => !forDeletion.includes(item)));

            if (Arr.length >= 7) {
                let stepX = document.querySelector('.step-2');
                stepX.firstElementChild.classList.remove('bgChange2')
                stepX.firstElementChild.classList.add('bgChange');
                if(document.querySelector('.threedcheck').value == '1') {
                    form.submit();
                } else {
                    step(2, "63");
                }
            }
        });

        completeBtn.addEventListener('click', () => {
            let firstCheckBtn = form.elements[14],
                secondCheckBtn = form.elements[15];

            firstCheckBtn.checked == false ? firstCheckBtn.nextElementSibling.nextElementSibling.classList.add('errorActive') : firstCheckBtn.nextElementSibling.nextElementSibling.classList.remove('errorActive');
            secondCheckBtn.checked == false ? secondCheckBtn.nextElementSibling.nextElementSibling.classList.add('errorActive') : secondCheckBtn.nextElementSibling.nextElementSibling.classList.remove('errorActive');

            if ((firstCheckBtn.checked && secondCheckBtn.checked) && Arr.length >= 7) {
                form.submit();
            }

        })

        urunBack.addEventListener('click', () => {
            //change step
            let layout = document.querySelector(`.set-payment-step-2-detail`);
            layout.style.display = "none";
            layout.previousElementSibling.style.display = "block";
            //change bar
            // document.styleSheets[0].addRule('.set-payment-active-step-1 .payment-progress .bar::before', `width: 11%`);
            document.querySelector('.bar').classList.add('w11');
            //change ellipses
            let step1 = document.querySelector(`.step-1`);
            let step2 = document.querySelector(`.step-2`);
            step1.firstElementChild.classList.remove('bgChange');
            step2.firstElementChild.classList.remove('bgChange2');
        })

        teslimatBackBtn.addEventListener('click', () => {
            //change step
            let layout = document.querySelector(`.set-payment-step-3-detail`);
            layout.style.display = "none";
            layout.previousElementSibling.style.display = "block";
            //change bar
            // document.styleSheets[0].addRule('.set-payment-active-step-1 .payment-progress .bar::before', `width: 37%`);
            document.querySelector('.bar').classList.add('w37');
            //change ellipses
            let step2 = document.querySelector(`.step-3`);
            step2.firstElementChild.classList.remove('bgChange2');
        })
    }
});