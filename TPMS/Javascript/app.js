const navSlide = () => {
    const burger = document.querySelector('.burger');
    const navLinks = document.querySelectorAll('.nav-links li');
    const nav = document.querySelector('.nav-links');
    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active')
    });
    navLinks.forEach((link , index)=>{
        link.style.animation =`navLinkFade 0.5s ease forwards ${index / 7 + 1.5}s`;
    });
}
navSlide();



