const docEl = document.documentElement;
const toggleBtn = document.querySelector('[data-theme-toggle]');
let currentTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
docEl.setAttribute('data-theme', currentTheme);

const updateThemeIcon = () => {
  if (!toggleBtn) return;
  toggleBtn.setAttribute('aria-label', currentTheme === 'dark' ? 'Ganti ke mode terang' : 'Ganti ke mode gelap');
  toggleBtn.innerHTML = currentTheme === 'dark'
    ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>'
    : '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>';
};
updateThemeIcon();

toggleBtn?.addEventListener('click', () => {
  currentTheme = currentTheme === 'dark' ? 'light' : 'dark';
  docEl.setAttribute('data-theme', currentTheme);
  updateThemeIcon();
});

const nav = document.getElementById('mainNav');
const onScroll = () => {
  if (!nav) return;
  nav.classList.toggle('scrolled', window.scrollY > 20);
};
window.addEventListener('scroll', onScroll);
onScroll();

const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-link-custom');
const setActiveLink = () => {
  let current = '';
  sections.forEach(section => {
    const top = section.offsetTop - 120;
    const height = section.offsetHeight;
    if (window.scrollY >= top && window.scrollY < top + height) {
      current = section.getAttribute('id');
    }
  });
  navLinks.forEach(link => {
    link.classList.toggle('active', link.getAttribute('href') === `#${current}`);
  });
};
window.addEventListener('scroll', setActiveLink);
setActiveLink();

const bars = document.querySelectorAll('.progress-bar[data-target]');
const barsObserver = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const bar = entry.target;
      bar.style.width = `${bar.dataset.target}%`;
      observer.unobserve(bar);
    }
  });
}, { threshold: 0.5 });
bars.forEach(bar => barsObserver.observe(bar));

const revealItems = document.querySelectorAll('.section-heading, .section-body, .skill-card, .project-card, .contact-form-card, .about-info-item, .contact-info-item');
revealItems.forEach(item => item.classList.add('reveal'));
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
    }
  });
}, { threshold: 0.15 });
revealItems.forEach(item => revealObserver.observe(item));
