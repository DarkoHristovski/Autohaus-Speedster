let burgerBtn = document.querySelector('.burger')

let burgerBtnFunction = (e) =>{
    e.preventDefault;
    document.body.classList.toggle('show-menu');
    }

burgerBtn.addEventListener('click',burgerBtnFunction);