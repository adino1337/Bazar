const openModalButtons = document.querySelectorAll('[data-modal-target]');
const closeModalButtons = document.querySelectorAll('[data-close-button]');
const overlay = document.getElementById('overlay');

const nav = document.getElementById('nav');

const logInputs = document.querySelectorAll('.input-group input');

logInputs.forEach(input => {
    input.addEventListener('focus', () => {
        input.previousElementSibling.style.color = "#04c582";
    })
    input.addEventListener('focusout', () => {
        input.previousElementSibling.style.color = "#636b7b";
    })

})

const signUP = document.getElementById('signUP');
const login = document.getElementById('login');

const loginForm = document.getElementById('loginForm');
const regForm = document.getElementById('regForm')

login.addEventListener('click', () => {
    regForm.classList.remove('activeLogin');
    loginForm.classList.add('activeLogin');
})

signUP.addEventListener('click', () => {
    loginForm.classList.remove('activeLogin');
    regForm.classList.add('activeLogin');
})

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget);
        openModal(modal);
    })
})

closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = button.closest('.modal');
        closeModal(modal);
    })
})

overlay.addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal.active');
    modals.forEach(modal => {
        modal.classList.remove('active');
    })
    overlay.classList.remove('active');
})

function openModal(modal){
    if (modal == null) return;
    modal.classList.add('active');
    overlay.classList.add('active');
    nav.classList.add('zindex');
}

function closeModal(modal){
    if (modal == null) return;
    nav.classList.remove('zindex');
    modal.classList.remove('active');
    overlay.classList.remove('active');
    
}


document.body.addEventListener('keyup', (e) => {
  if (e.key == "Escape") {
    const modals = document.querySelectorAll('.modal.active');
    modals.forEach(modal => {
        modal.classList.remove('active');
    })
    overlay.classList.remove('active');
  }
});