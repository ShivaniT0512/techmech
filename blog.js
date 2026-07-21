// Mobile menu toggle
function toggleMobileMenu() {
  document.querySelector('.mobile-menu').classList.toggle('active');
}

// Header scroll state + back-to-top visibility
const header = document.querySelector('.header');
const backToTop = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
  header.classList.toggle('scrolled', window.scrollY > 50);
  if (backToTop) backToTop.classList.toggle('visible', window.scrollY > 600);
});

// Reveal on scroll
const reveals = document.querySelectorAll('.reveal');
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach((entry, i) => {
    if (entry.isIntersecting) {
      setTimeout(() => entry.target.classList.add('active'), i * 80);
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
reveals.forEach(el => revealObserver.observe(el));

// Blog category filter
function filterCategory(el, cat) {
  document.querySelectorAll('.blog-cat').forEach(c => c.classList.remove('active'));
  el.classList.add('active');
  document.querySelectorAll('.blog-card').forEach(card => {
    card.style.display = (cat === 'all' || card.dataset.category === cat) ? '' : 'none';
  });
}

// Blog search filter
function filterBlog() {
  const q = document.getElementById('blogSearch').value.toLowerCase();
  document.querySelectorAll('.blog-card').forEach(card => {
    card.style.display = card.textContent.toLowerCase().includes(q) ? '' : 'none';
  });
}

// Smooth scroll for in-page anchors
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', function (e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth' });
    }
  });
});
