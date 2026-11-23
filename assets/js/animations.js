(function() {
  if (!window.IntersectionObserver) { return; }
  var io = new IntersectionObserver(function(entries) {
    entries.forEach(function(e) {
      if (e.isIntersecting) { e.target.classList.add('gratis-visible'); io.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.wp-block-group, .demo-feature-card, .demo-preview-card, .wp-block-heading, .demo-stat').forEach(function(el) {
      el.classList.add('gratis-animate'); io.observe(el);
    });
  });
})();
