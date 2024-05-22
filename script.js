let hamburgerMenu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

hamburgerMenu.addEventListener('click',function(){
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
})

userBtn.addEventListener('click',function(){
    let userBox = document.querySelector('.user-box');
    userBox.classList.toggle('active');
})

//close form

// const closeBtn = document.querySelector('#close-edit');

// closeBtn.addEventListener('click',()=>{
//     document.querySelector('.update-container').style.display='none';
// })

/*------------------testimonial------------------*/
let slides = document.querySelectorAll('.testimonial-item');
let index = 0;
function nextSlide(){
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prevSlide(){
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}

// const nextButton = document.querySelector('.bi bi-arrow-left');
//         const prevButton = document.querySelector('.bi bi-arrow-right');

//         nextButton.addEventListener('click', nextSlide);
//         prevButton.addEventListener('click', prevSlide);

