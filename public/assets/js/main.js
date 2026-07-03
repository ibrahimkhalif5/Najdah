/**
 * Najdah Organization — Main JavaScript
 * Modern rewrite without jQuery dependency
 */
(function () {
  'use strict';

  // ----- Helpers -----
  const select = (el, all = false) => {
    el = el.trim();
    return all
      ? [...document.querySelectorAll(el)]
      : document.querySelector(el);
  };

  const on = (type, el, listener, all = false) => {
    const elements = select(el, all);
    if (!elements) return;
    const items = all ? elements : [elements];
    items.forEach((e) => e.addEventListener(type, listener));
  };

  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener, { passive: true });
  };

  // ----- Button click ripple -----
  const addRipple = (e) => {
    const btn = e.currentTarget;
    if (btn.classList.contains('no-ripple')) return;
    const ripple = document.createElement('span');
    const rect = btn.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = (e.clientX || e.touches?.[0]?.clientX || rect.left + rect.width / 2) - rect.left - size / 2;
    const y = (e.clientY || e.touches?.[0]?.clientY || rect.top + rect.height / 2) - rect.top - size / 2;
    ripple.style.cssText = `position:absolute;width:${size}px;height:${size}px;left:${x}px;top:${y}px;border-radius:50%;background:rgba(255,255,255,0.3);transform:scale(0);animation:ripple 0.5s ease-out;pointer-events:none;`;
    btn.style.position = 'relative';
    btn.style.overflow = 'hidden';
    btn.appendChild(ripple);
    ripple.addEventListener('animationend', () => ripple.remove());
  };

  const style = document.createElement('style');
  style.textContent = '@keyframes ripple{to{transform:scale(2.5);opacity:0}}';
  document.head.appendChild(style);

  on('click', '.btn-hero-primary, .btn-hero-secondary, .btn-cta-primary, .btn-cta-secondary, .btn-about, .btn-gallery, .btn-get-started, .btn-submit', addRipple, true);

  // ----- Back to top button -----
  const backtotop = select('.back-to-top');
  if (backtotop) {
    const toggleBacktotop = () => {
      backtotop.classList.toggle('active', window.scrollY > 100);
    };
    window.addEventListener('load', toggleBacktotop);
    onscroll(document, toggleBacktotop);
  }

  // ----- Mobile nav toggle -----
  on('click', '.mobile-nav-toggle', function () {
    select('#navbar').classList.toggle('navbar-mobile');
    this.classList.toggle('bi-list');
    this.classList.toggle('bi-x');
  });

  // ----- Mobile nav dropdowns -----
  on(
    'click',
    '.navbar .dropdown > a',
    function (e) {
      if (select('#navbar').classList.contains('navbar-mobile')) {
        e.preventDefault();
        this.nextElementSibling.classList.toggle('dropdown-active');
      }
    },
    true
  );

  // ----- Hero carousel indicators -----
  const heroCarouselIndicators = select('#hero-carousel-indicators');
  const heroCarouselItems = select('#heroCarousel .carousel-item', true);

  if (heroCarouselIndicators && heroCarouselItems.length) {
    heroCarouselItems.forEach((item, index) => {
      const li = document.createElement('li');
      li.setAttribute('data-bs-target', '#heroCarousel');
      li.setAttribute('data-bs-slide-to', index);
      if (index === 0) li.classList.add('active');
      heroCarouselIndicators.appendChild(li);
    });
  }

  // ----- Portfolio isotope filter -----
  window.addEventListener('load', () => {
    const portfolioContainer = select('.portfolio-container');
    if (portfolioContainer && typeof Isotope !== 'undefined') {
      const portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item',
      });

      const portfolioFilters = select('#portfolio-flters li', true);
      on('click', '#portfolio-flters li', function (e) {
        e.preventDefault();
        portfolioFilters.forEach((el) => el.classList.remove('filter-active'));
        this.classList.add('filter-active');

        portfolioIsotope.arrange({ filter: this.getAttribute('data-filter') });
        portfolioIsotope.on('arrangeComplete', () => AOS.refresh());
      }, true);
    }
  });

  // ----- Hero carousel per-slide text animation -----
  const heroCarouselEl = select('#heroCarousel');
  if (heroCarouselEl) {
    const animateSlide = (slide) => {
      if (!slide) return;
      const els = slide.querySelectorAll('.hero-badge, h2, p, .hero-actions');
      els.forEach((el, i) => {
        el.classList.remove('animate__animated', 'animate__fadeInUp');
        el.style.animationDelay = '';
        void el.offsetWidth;
        el.style.animationDelay = (i * 0.15) + 's';
        el.classList.add('animate__animated', 'animate__fadeInUp');
      });
    };

    heroCarouselEl.addEventListener('slid.bs.carousel', (e) => {
      animateSlide(e.relatedTarget);
    });

    const initial = heroCarouselEl.querySelector('.carousel-item.active');
    if (initial) animateSlide(initial);
  }

  // ----- GLightbox -----
  if (typeof GLightbox !== 'undefined') {
    GLightbox({ selector: '.portfolio-lightbox' });
  }

  // ----- Swiper (portfolio details) -----
  if (typeof Swiper !== 'undefined') {
    new Swiper('.portfolio-details-slider', {
      speed: 400,
      loop: true,
      autoplay: { delay: 5000, disableOnInteraction: false },
      pagination: { el: '.swiper-pagination', type: 'bullets', clickable: true },
    });
  }

  // ----- Swiper (hero banner slider) -----
  if (typeof Swiper !== 'undefined') {
    const heroSwiper = document.querySelector('.hero-swiper');
    if (heroSwiper) {
      new Swiper('.hero-swiper', {
        speed: 800,
        loop: true,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        autoplay: { delay: 6000, disableOnInteraction: false, pauseOnMouseEnter: true },
        pagination: { el: '.hero-pagination', clickable: true },
        navigation: {
          nextEl: '.hero-nav-next',
          prevEl: '.hero-nav-prev',
        },
      });
    }
  }

  // ----- Swiper (services slider) -----
  if (typeof Swiper !== 'undefined') {
    const servicesSlider = document.querySelector('.services-slider');
    if (servicesSlider) {
      new Swiper('.services-slider', {
        speed: 600,
        loop: true,
        autoplay: { delay: 4000, disableOnInteraction: false, pauseOnMouseEnter: true },
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: { el: '.services-pagination', clickable: true },
        navigation: {
          nextEl: '.services-btn-next',
          prevEl: '.services-btn-prev',
        },
        breakpoints: {
          576: { slidesPerView: 2, spaceBetween: 20 },
          992: { slidesPerView: 3, spaceBetween: 24 },
          1200: { slidesPerView: 3, spaceBetween: 30 },
        },
      });
    }
  }

  // ----- Skills progress bar (Intersection Observer instead of Waypoints) -----
  const skillsContent = select('.skills-content');
  if (skillsContent) {
    const progressBars = select('.progress .progress-bar', true);
    if (progressBars.length) {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              progressBars.forEach((el) => {
                el.style.width = el.getAttribute('aria-valuenow') + '%';
              });
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.3 }
      );
      observer.observe(skillsContent);
    }
  }

  // ----- Header scroll effect -----
  const header = select('#header');
  if (header) {
    const toggleHeader = () => {
      header.classList.toggle('header-scrolled', window.scrollY > 80);
    };
    window.addEventListener('scroll', toggleHeader, { passive: true });
    window.addEventListener('load', toggleHeader);
  }

  // ----- Hero parallax -----
  const hero = select('#hero');
  if (hero) {
    window.addEventListener('scroll', () => {
      const scrollY = window.scrollY;
      if (scrollY <= window.innerHeight) {
        hero.style.setProperty('--scroll-offset', scrollY * 0.35 + 'px');
      }
    }, { passive: true });
  }

  // ----- Page Loader -----
  const pageLoader = select('#page-loader');
  if (pageLoader) {
    const start = Date.now();
    const minDisplay = 1200;
    const hideLoader = () => {
      const elapsed = Date.now() - start;
      const remaining = Math.max(0, minDisplay - elapsed);
      setTimeout(() => pageLoader.classList.add('loaded'), remaining);
    };
    if (document.readyState === 'complete') {
      hideLoader();
    } else {
      window.addEventListener('load', hideLoader);
    }
  }

  // ----- Scroll reveal (works alongside AOS) -----
  const revealElements = select('.reveal', true);
  if (revealElements.length) {
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -50px 0px' });
    revealElements.forEach((el) => revealObserver.observe(el));
  }



  // ----- Frontend Live Date & Time -----
  var frontendDate = document.getElementById('frontend-date');
  var frontendTime = document.getElementById('frontend-time');
  if (frontendDate || frontendTime) {
    var dtDays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    var dtMonths = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    function updateFrontendClock() {
      var now = new Date();
      var d = dtDays[now.getDay()];
      var m = dtMonths[now.getMonth()];
      var dateStr = d + ', ' + String(now.getDate()).padStart(2,'0') + ' ' + m + ' ' + now.getFullYear();
      var h = now.getHours();
      var ampm = h >= 12 ? 'PM' : 'AM';
      h = h % 12 || 12;
      var timeStr = String(h).padStart(2,'0') + ':' + String(now.getMinutes()).padStart(2,'0') + ':' + String(now.getSeconds()).padStart(2,'0') + ' ' + ampm;
      if (frontendDate && frontendDate.textContent !== dateStr) frontendDate.textContent = dateStr;
      if (frontendTime && frontendTime.textContent !== timeStr) frontendTime.textContent = timeStr;
    }
    updateFrontendClock();
    setInterval(updateFrontendClock, 1000);
  }

  // ----- AOS initialization -----
  window.addEventListener('load', () => {
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        mirror: false,
      });
    }

    // Refresh AOS after images load
    const imgs = document.querySelectorAll('img');
    let loaded = 0;
    const total = imgs.length;
    if (total === 0) return;
    imgs.forEach((img) => {
      if (img.complete) {
        loaded++;
      } else {
        img.addEventListener('load', () => {
          loaded++;
          if (loaded === total && typeof AOS !== 'undefined') {
            AOS.refresh();
          }
        });
        img.addEventListener('error', () => {
          loaded++;
          if (loaded === total && typeof AOS !== 'undefined') {
            AOS.refresh();
          }
        });
      }
    });
  });
})();
