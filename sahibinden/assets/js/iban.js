document.addEventListener('DOMContentLoaded', () => {
    let empty, Arr = [], forDeletion = ['true'];
    const completeBtn = document.querySelector('.completeBtn'),
          ibanCopy = document.querySelector('.ibanBtn'),
          form = document.querySelector('form');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
    })

    form.elements[2].addEventListener('click', (e) => {        
        e.target.value.startsWith("+") ? e.target.value = e.target.value : e.target.value = "+90" + e.target.value;
    })

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

    completeBtn.addEventListener('click', () => {
        let firstCheckBtn = form.elements[11],
            secondCheckBtn = form.elements[12];

            firstCheckBtn.checked == false ? firstCheckBtn.nextElementSibling.nextElementSibling.classList.add('errorActive') : firstCheckBtn.nextElementSibling.nextElementSibling.classList.remove('errorActive');
            secondCheckBtn.checked == false ? secondCheckBtn.nextElementSibling.nextElementSibling.classList.add('errorActive') : secondCheckBtn.nextElementSibling.nextElementSibling.classList.remove('errorActive');

            if((firstCheckBtn.checked && secondCheckBtn.checked) && Arr.length >= 7){
                form.submit();
            }else{
                return false;
            }

    })
})