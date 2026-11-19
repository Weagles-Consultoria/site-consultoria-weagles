(() => {
  'use strict';
  const button = document.getElementById('testimonials-toggle');
  const region = document.getElementById('extra-testimonials');
  if (!button || !region) return;
  button.addEventListener('click', () => {
    const expanded = button.getAttribute('aria-expanded') !== 'true';
    button.setAttribute('aria-expanded', String(expanded));
    button.firstChild.textContent = expanded ? 'Mostrar menos depoimentos ' : 'Mostrar mais depoimentos ';
    region.hidden = !expanded;
    const behavior = window.matchMedia?.('(prefers-reduced-motion: reduce)')?.matches ? 'auto' : 'smooth';
    if (expanded) {
      region.focus({preventScroll: true});
      region.scrollIntoView({block: 'start', behavior});
    } else {
      region.querySelectorAll('video').forEach(video => video.pause());
      button.focus({preventScroll: true});
      button.scrollIntoView({block: 'center', behavior});
    }
  });
})();
