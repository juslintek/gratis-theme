(function() {
  if (!window.IntersectionObserver) { return; }
  var targets = document.querySelectorAll('.gratis-reveal');
  if (!targets.length) { return; }
  var io = new IntersectionObserver(function(entries) {
    entries.forEach(function(e) {
      if (e.isIntersecting) {
        e.target.classList.add('gratis-visible');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.05 });
  targets.forEach(function(el) {
    el.classList.add('gratis-animate');
    io.observe(el);
  });
})();
