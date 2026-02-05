import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

  let isFirstLoad = true;
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
    on: {
      init: function () {
        setTimeout(() => { isFirstLoad = false; }, 500);
      },
      reachEnd: function () {
        if (window.innerWidth <= 768 && !isFirstLoad) {
          console.log("Last slide reached on mobile, scrolling to next section...");
          setTimeout(() => {
            const nextSection = document.querySelector('.stats-section');
            if (nextSection) {
              nextSection.scrollIntoView({ behavior: 'smooth' });
            }
          }, 1000);
        }
      },
      reachBeginning: function () {
        if (window.innerWidth <= 768 && !isFirstLoad) {
          console.log("First slide reached on mobile, scrolling to previous section...");
          setTimeout(() => {
            const prevSection = document.querySelector('.hero-section');
            if (prevSection) {
              prevSection.scrollIntoView({ behavior: 'smooth' });
            }
          }, 1000);
        }
      }
    }
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
      const increment = Math.ceil(target / 200);

      const updateCounter = () => {
        current += increment;
        if (current >= target) {
          counter.textContent = `${target}+`;
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
  }, { threshold: 0. });

  observer.observe(document.querySelector('.stats-section'));
});




// For About us Section
// document.addEventListener('DOMContentLoaded', function () {

//     const buttons  = document.querySelectorAll('.see-more-btn');
//     const wrappers = document.querySelectorAll('.text-wrapper');

//     if (!buttons.length || !wrappers.length) return;

//     buttons.forEach(button => {
//         button.addEventListener('click', function () {

//             // check state from first wrapper
//             const isCollapsed = wrappers[0].classList.contains('collapsed');

//             // toggle ALL wrappers
//             wrappers.forEach(wrapper => {
//                 if (isCollapsed) {
//                     wrapper.classList.remove('collapsed');
//                 } else {
//                     wrapper.classList.add('collapsed');
//                 }
//             });

//             // update ALL buttons text
//             buttons.forEach(btn => {
//                 btn.textContent = isCollapsed ? 'See less' : 'See more';
//             });

//         });
//     });

// });


document.querySelectorAll('.see-more-btn').forEach(btn => {
  btn.addEventListener('click', function () {

    const slider = this.closest('.vertical-slider');

    if (slider) {
      slider.classList.add('vertical-mobile-slider');
    }
  });
});









