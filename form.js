(() => {
  'use strict';
  const marquee = document.getElementById('client-marquee');
  const toggle = document.querySelector('.marquee-toggle');
  toggle?.addEventListener('click', () => {
    const paused = toggle.getAttribute('aria-pressed') !== 'true';
    toggle.setAttribute('aria-pressed', String(paused));
    toggle.setAttribute('aria-label', paused ? 'Retomar movimento dos clientes' : 'Pausar movimento dos clientes');
    toggle.title = paused ? 'Retomar movimento' : 'Pausar movimento';
    toggle.innerHTML = paused ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m9 5 10 7-10 7z"/></svg>' : '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M9 6v12M15 6v12"/></svg>';
    marquee?.classList.toggle('is-paused', paused);
  });
  const dialog = document.getElementById('cadastro');
  const form = document.getElementById('lead-form');
  if (!dialog || !form) return;
  const steps = [...form.querySelectorAll('[data-form-step]')];
  const error = document.getElementById('form-error');
  const next = document.getElementById('form-next');
  const back = document.getElementById('form-back');
  const submit = document.getElementById('form-submit');
  let currentStep = 1;
  let busy = false;
  let complete = false;
  let opener = null;
  let sourcePosition = 'pagina';
  let requestId = '';

  function showError(message, field) {
    error.textContent = message;
    error.hidden = false;
    if (field) { field.setAttribute('aria-invalid', 'true'); field.focus(); }
  }
  function clearError() {
    error.hidden = true;
    error.textContent = '';
    form.querySelectorAll('[aria-invalid]').forEach(field => field.removeAttribute('aria-invalid'));
  }
  function showStep(step) {
    currentStep = step;
    clearError();
    steps.forEach((fieldset, i) => { fieldset.hidden = i + 1 !== step; fieldset.disabled = i + 1 !== step; });
    document.getElementById('form-step-label').textContent = `Passo ${step} de 2`;
    document.getElementById('form-progress-bar').style.width = `${step * 50}%`;
    document.getElementById('form-title').textContent = step === 1 ? 'Como estão suas vendas?' : 'Como podemos falar com você?';
    document.getElementById('form-intro').textContent = step === 1 ? 'São poucas perguntas para entendermos o seu momento.' : 'Deixe seu contato para a nossa equipe retornar.';
    back.hidden = step === 1;
    next.hidden = step === 2;
    submit.hidden = step === 1;
    document.querySelector('.lead-form-body').scrollTop = 0;
    document.getElementById('form-title').focus({preventScroll: true});
  }
  function validateStep() {
    clearError();
    const fields = [...steps[currentStep - 1].querySelectorAll('input,select')];
    for (const field of fields) {
      if (field.required && !field.value.trim()) { showError('Preencha este campo para continuar.', field); return false; }
      if (!field.checkValidity()) { showError(field.name === 'full_name' ? 'Informe seu nome com pelo menos 3 caracteres.' : 'Confira este campo para continuar.', field); return false; }
    }
    if (currentStep === 2) {
      const phone = document.getElementById('lead-phone');
      const digits = phone.value.replace(/\D/g, '');
      const local = digits.startsWith('55') && digits.length > 11 ? digits.slice(2) : digits;
      if (!/^[1-9]\d\d{8,9}$/.test(local)) { showError('Informe um telefone válido com DDD, por exemplo: (16) 99999-9999.', phone); return false; }
    }
    return true;
  }
  document.querySelectorAll('[data-open-form]').forEach(link => link.addEventListener('click', event => {
    event.preventDefault();
    opener = link;
    sourcePosition = link.dataset.position || 'pagina';
    if (!complete) showStep(currentStep);
    dialog.showModal();
    document.body.classList.add('form-is-open');
    if (complete) document.getElementById('form-success').focus();
    else document.getElementById('form-title').focus({preventScroll: true});
    window.WeaglesTracking?.formOpened(sourcePosition);
  }));
  function close() { if (!busy) dialog.close(); }
  document.querySelectorAll('[data-close-form]').forEach(button => button.addEventListener('click', close));
  dialog.addEventListener('cancel', event => { if (busy) event.preventDefault(); });
  dialog.addEventListener('close', () => { document.body.classList.remove('form-is-open'); opener?.focus({preventScroll: true}); });
  next.addEventListener('click', () => { if (validateStep()) showStep(2); });
  back.addEventListener('click', () => showStep(1));
  form.addEventListener('keydown', event => {
    if (event.key === 'Enter' && currentStep === 1 && event.target.tagName !== 'BUTTON') { event.preventDefault(); if (validateStep()) showStep(2); }
  });
  form.addEventListener('input', clearError);
  form.addEventListener('change', clearError);
  form.addEventListener('submit', async event => {
    event.preventDefault();
    if (busy || complete) return;
    if (currentStep === 1) { if (validateStep()) showStep(2); return; }
    if (!validateStep()) return;
    const endpoint = window.WEAGLES_CONFIG?.leadEndpoint;
    if (!endpoint) { showError('O envio está temporariamente indisponível. Tente novamente em instantes.'); return; }
    let url;
    try { url = new URL(endpoint, location.href); if (!['https:', 'http:'].includes(url.protocol)) throw Error(); if (location.protocol === 'https:' && url.protocol !== 'https:') throw Error(); } catch (_) { showError('O envio está temporariamente indisponível. Tente novamente em instantes.'); return; }
    if (!requestId) requestId = crypto.randomUUID();
    const values = {};
    form.querySelectorAll('input[name],select[name]').forEach(field => { values[field.name] = field.value.trim(); });
    let phone = values.phone.replace(/\D/g, '');
    if (phone.length <= 11) phone = `55${phone}`;
    const query = new URLSearchParams(location.search);
    const attribution = {};
    for (const key of ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'fbclid']) { const value = query.get(key); if (value) attribution[key] = value.slice(0, 500); }
    const payload = {schema_version: 2, request_id: requestId, full_name: values.full_name, phone, challenge: values.challenge, seller_count: values.seller_count, monthly_revenue: values.monthly_revenue, segment: values.segment, company_role: values.company_role, instagram: values.instagram || '', source: 'landing_weagles', cta_position: sourcePosition, page_path: location.pathname, attribution, contact_requested: true};
    busy = true;
    form.setAttribute('aria-busy', 'true');
    submit.disabled = true;
    back.disabled = true;
    submit.textContent = 'Enviando…';
    const controller = new AbortController();
    const timer = setTimeout(() => controller.abort(), 15000);
    try {
      const response = await fetch(url.href, {method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify(payload), signal: controller.signal, credentials: url.origin === location.origin ? 'same-origin' : 'omit'});
      const result = await response.json();
      if (!response.ok || result.ok !== true || typeof result.lead_id !== 'string' || !result.lead_id.trim()) throw Error('not_recorded');
      complete = true;
      clearError();
      steps.forEach(fieldset => { fieldset.hidden = true; fieldset.disabled = true; });
      document.querySelector('.form-progress').hidden = true;
      document.getElementById('form-title').hidden = true;
      document.getElementById('form-intro').hidden = true;
      document.getElementById('form-actions').hidden = true;
      const success = document.getElementById('form-success');
      success.hidden = false;
      success.focus();
      window.WeaglesTracking?.leadRecorded(requestId);
      form.reset();
    } catch (_) {
      showError('Não foi possível confirmar o recebimento do cadastro. Confira sua conexão e tente novamente.');
    } finally {
      clearTimeout(timer);
      busy = false;
      form.removeAttribute('aria-busy');
      submit.disabled = false;
      back.disabled = false;
      submit.textContent = 'Enviar cadastro';
    }
  });
})();
