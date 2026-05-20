(function () {
  'use strict';

  /* ── Navbar scroll effect ── */
  const navbar = document.getElementById('navbar');
  const onScrollNavbar = () => {
    if (window.scrollY > 20) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  };
  window.addEventListener('scroll', onScrollNavbar, { passive: true });
  onScrollNavbar();

  /* ── Mobile nav toggle ── */
  const navToggle = document.getElementById('navToggle');
  const navLinks  = document.getElementById('navLinks');
  const toggleIcon = document.getElementById('toggleIcon');

  navToggle.addEventListener('click', () => {
    const isOpen = navLinks.classList.toggle('open');
    toggleIcon.className = isOpen ? 'bi bi-x-lg' : 'bi bi-list';
  });

  /* ── Close mobile nav on link click ── */
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      navLinks.classList.remove('open');
      toggleIcon.className = 'bi bi-list';
    });
  });

  /* ── Smooth scroll for .scrollto ── */
  document.querySelectorAll('.scrollto').forEach(el => {
    el.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const navH = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--nav-h')) || 70;
        const top  = target.getBoundingClientRect().top + window.scrollY - navH;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });

  /* ── Active nav link on scroll ── */
  const sections    = document.querySelectorAll('section[id]');
  const navLinkEls  = document.querySelectorAll('.nav-links .nav-link');

  const setActiveLink = () => {
    const pos = window.scrollY + 120;
    sections.forEach(section => {
      const top    = section.offsetTop;
      const height = section.offsetHeight;
      const id     = section.getAttribute('id');
      const link   = document.querySelector(`.nav-links a[href="#${id}"]`);
      if (link) {
        if (pos >= top && pos < top + height) {
          navLinkEls.forEach(l => l.classList.remove('active'));
          link.classList.add('active');
        }
      }
    });
  };
  window.addEventListener('scroll', setActiveLink, { passive: true });

  /* ── Back to top ── */
  const backToTop = document.getElementById('backToTop');
  if (backToTop) {
    window.addEventListener('scroll', () => {
      backToTop.classList.toggle('active', window.scrollY > 300);
    }, { passive: true });

    backToTop.addEventListener('click', e => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ── Publication tabs ── */
  document.querySelectorAll('.pub-tab').forEach(tab => {
    tab.addEventListener('click', function () {
      const target = this.dataset.tab;

      document.querySelectorAll('.pub-tab').forEach(t => t.classList.remove('active'));
      document.querySelectorAll('.pub-panel').forEach(p => p.classList.remove('active'));

      this.classList.add('active');
      const panel = document.getElementById('tab-' + target);
      if (panel) panel.classList.add('active');
    });
  });

  /* ── Typed.js ── */
  const typedEl = document.querySelector('.typed');
  if (typedEl && typeof Typed !== 'undefined') {
    const strings = typedEl.getAttribute('data-typed-items').split(',');
    new Typed('.typed', {
      strings,
      loop:      true,
      typeSpeed: 80,
      backSpeed: 40,
      backDelay: 2200,
    });
  }

  /* ── PureCounter ── */
  if (typeof PureCounter !== 'undefined') {
    new PureCounter();
  }

  /* ── AOS ── */
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 700,
      easing:   'ease-out-cubic',
      once:     true,
      offset:   60,
    });
  }

  /* ── Scroll-to-top on hash load ── */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      const target = document.querySelector(window.location.hash);
      if (target) {
        setTimeout(() => {
          const navH = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--nav-h')) || 70;
          window.scrollTo({ top: target.offsetTop - navH, behavior: 'smooth' });
        }, 100);
      }
    }
  });

})();
