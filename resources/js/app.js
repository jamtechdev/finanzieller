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


document.addEventListener('DOMContentLoaded', function () {

    const counters = document.querySelectorAll('.counter');
    let started = false;

    function startCounting() {
        if (started) return;
        started = true;

        counters.forEach(counter => {
            const target = +counter.getAttribute('data-count');
            let current = 0;
            const increment = Math.ceil(target / 80);

            const updateCounter = () => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target;
                } else {
                    counter.textContent = current;
                    requestAnimationFrame(updateCounter);
                }
            };

            updateCounter();
        });
    }

    /* Trigger when section is visible */
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                startCounting();
                observer.disconnect();
            }
        });
    }, { threshold: 0.5 });

    observer.observe(document.querySelector('.stats-section'));
});