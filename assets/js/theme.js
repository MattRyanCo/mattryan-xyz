// :::SECTION:Scroll Animations:::
document.documentElement.classList.add('js');

const animatedElements = document.querySelectorAll('.animate-on-scroll');

if (!('IntersectionObserver' in window)) {
  animatedElements.forEach(el => el.classList.add('is-visible'));
} else if (animatedElements.length > 0) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -40px 0px'
  });

  animatedElements.forEach(el => observer.observe(el));
}
