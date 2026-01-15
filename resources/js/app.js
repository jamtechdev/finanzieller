import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

  var swiper = new Swiper(".vertical-slider", {
    direction: "vertical",
    slidesPerView: 1,
    mousewheel: {
      forceToAxis: true,
      sensitivity: 1,
      releaseOnEdges: true,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  const hamburger = document.querySelector('.hamburger');
  const navMenu = document.querySelector('.nav-menu');

  hamburger?.addEventListener('click', () => {
    navMenu.classList.toggle('active');
  });

  document.addEventListener('click', (event) => {
    if (!navMenu.contains(event.target) && !hamburger.contains(event.target)) {
      navMenu.classList.remove('active');
    }
  });

  navMenu?.addEventListener('click', (event) => {
    if (event.target.tagName === 'A') {
      navMenu.classList.remove('active');
    }
  });

});
