(() => {
  'use strict';
  const invite = document.getElementById('diagnostic-invite');
  if (!invite) return;
  const sessionKey = 'weagles:diagnostic-invite:v1';
  try { if (sessionStorage.getItem(sessionKey) === 'shown') return; } catch (_) { }

  const cookies = document.getElementById('cookie-banner');
  const form = document.getElementById('cadastro');
  let delayFinished = false;
  let shown = false;
  let dismissed = false;

  function remember() {
    try { sessionStorage.setItem(sessionKey, 'shown'); } catch (_) { }
  }
  function dismiss() {
    invite.hidden = true;
    dismissed = true;
    remember();
  }
  function showWhenAvailable() {
    if (form?.open) { dismiss(); return; }
    if ((cookies && !cookies.hidden) || document.visibilityState !== 'visible') {
      invite.hidden = true;
      return;
    }
    if (!delayFinished || shown || dismissed) return;
    invite.hidden = false;
    shown = true;
    remember();
  }

  invite.querySelector('.invite-close').addEventListener('click', dismiss);
  document.querySelectorAll('[data-open-form]').forEach(button => button.addEventListener('click', dismiss));
  document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && !invite.hidden && !form?.open) dismiss();
  });
  document.addEventListener('visibilitychange', showWhenAvailable);
  if (cookies) new MutationObserver(showWhenAvailable).observe(cookies, {attributes: true, attributeFilter: ['hidden']});
  if (form) new MutationObserver(showWhenAvailable).observe(form, {attributes: true, attributeFilter: ['open']});
  setTimeout(() => { delayFinished = true; showWhenAvailable(); }, 2500);
})();
