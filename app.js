(() => {
  'use strict';
  const config = window.WEAGLES_CONFIG || {};
  const consentKey = 'weagles:measurement-consent:v1';
  const consentMaxAge = 180 * 24 * 60 * 60 * 1000;
  let consent = null;
  let pixelInitialized = false;
  let pageViewSent = false;
  const playedVideos = new Set();
  const recordedLeads = new Set();

  try {
    const saved = JSON.parse(localStorage.getItem(consentKey));
    if (saved && typeof saved.allowed === 'boolean' && Date.now() - saved.at < consentMaxAge) consent = saved.allowed;
  } catch (_) { /* Armazenamento bloqueado não impede o uso da página. */ }

  function eligiblePixel() {
    return config.pixelEnabled === true && /^\d{5,25}$/.test(config.metaPixelId || '') &&
      Array.isArray(config.pixelAllowedHosts) && config.pixelAllowedHosts.includes(location.hostname);
  }

  function initializePixel() {
    if (!consent || !eligiblePixel()) return;
    if (!pixelInitialized) {
      // Código base do Meta Pixel. A biblioteca só é solicitada após consentimento.
      if (!window.fbq) {
        const n = window.fbq = function () { n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments); };
        if (!window._fbq) window._fbq = n;
        n.push = n; n.loaded = true; n.version = '2.0'; n.queue = [];
        const script = document.createElement('script');
        script.async = true;
        script.src = 'https://connect.facebook.net/en_US/fbevents.js';
        document.head.appendChild(script);
      }
      window.fbq('consent', 'grant');
      window.fbq('init', config.metaPixelId);
      // Não inferir automaticamente leads a partir dos cliques desta página.
      window.fbq('set', 'autoConfig', false, config.metaPixelId);
      pixelInitialized = true;
    } else {
      window.fbq('consent', 'grant');
    }
    if (!pageViewSent) {
      window.fbq('trackSingle', config.metaPixelId, 'PageView');
      pageViewSent = true;
    }
  }

  function trackCustom(name, parameters) {
    if (!consent || !eligiblePixel()) return;
    initializePixel();
    if (pixelInitialized) window.fbq('trackSingleCustom', config.metaPixelId, name, parameters);
  }

  window.WeaglesTracking = Object.freeze({
    formOpened(position) { trackCustom('FormOpen', {cta_position: position || 'pagina'}); },
    leadRecorded(leadId) {
      if (!leadId || recordedLeads.has(leadId) || !consent || !eligiblePixel()) return;
      initializePixel();
      if (pixelInitialized) {
        window.fbq('trackSingle', config.metaPixelId, 'Lead', {content_name: 'Cadastro Weagles'}, {eventID: leadId});
        recordedLeads.add(leadId);
      }
    }
  });

  function updateConsent(allowed) {
    consent = allowed;
    try { localStorage.setItem(consentKey, JSON.stringify({allowed, at: Date.now()})); } catch (_) { }
    const banner = document.getElementById('cookie-banner');
    if (banner) banner.hidden = true;
    if (allowed) initializePixel();
    else if (pixelInitialized && window.fbq) window.fbq('consent', 'revoke');
  }

  const banner = document.getElementById('cookie-banner');
  if (banner) banner.hidden = consent !== null;
  document.getElementById('cookies-accept')?.addEventListener('click', () => updateConsent(true));
  document.getElementById('cookies-reject')?.addEventListener('click', () => updateConsent(false));
  document.querySelectorAll('[data-cookie-settings]').forEach(button => button.addEventListener('click', () => {
    if (banner) { banner.hidden = false; document.getElementById('cookies-reject')?.focus(); }
  }));

  const phone = String(config.whatsapp || '').replace(/\D/g, '');
  document.querySelectorAll('[data-whatsapp]').forEach(link => {
    if (/^\d{10,15}$/.test(phone)) link.href = `https://wa.me/${phone}?text=${encodeURIComponent(config.whatsappMessage || 'Olá! Quero conversar com a Weagles.')}`;
    link.addEventListener('click', () => {
      trackCustom('WhatsAppClick', {cta_position: link.dataset.position || 'pagina', content_name: 'Landing Weagles'});
    });
  });
  document.querySelectorAll('video[data-testimonial]').forEach(video => {
    video.addEventListener('play', () => {
      document.querySelectorAll('video[data-testimonial]').forEach(other => { if (other !== video) other.pause(); });
      const name = video.dataset.testimonial;
      if (!playedVideos.has(name)) {
        trackCustom('TestimonialPlay', {content_name: name});
        playedVideos.add(name);
      }
    });
  });
  const year = document.getElementById('year');
  if (year) year.textContent = String(new Date().getFullYear());
  initializePixel();
})();
