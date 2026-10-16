const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.registration-link');


registerLink.addEventListener('click',()=> {
    wrapper.classList.add('active');
    wrapper.scroll({top:0,behavioufa: "smooth"});
});

loginLink.addEventListener('click',()=> {
    wrapper.classList.remove('active');
    wrapper.scroll({top:0,behavior: "smooth"});
});

