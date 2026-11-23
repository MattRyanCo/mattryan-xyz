/**
 * Mobile navigation overlay.
 *
 * Replaces WordPress's Interactivity-API navigation script. Toggles the
 * same classes the WordPress block CSS expects:
 *   - .has-modal-open / .is-menu-open on the responsive container
 *   - .has-modal-open on <html> (locks page scroll)
 * Closes on the close button, Escape, or when focus leaves the dialog.
 */
(function () {
  document.querySelectorAll('[data-nav]').forEach(function (nav) {
    var openBtn = nav.querySelector('[data-nav-open]');
    var closeBtn = nav.querySelector('[data-nav-close]');
    var container = nav.querySelector('[data-nav-container]');
    var dialog = nav.querySelector('[data-nav-dialog]');
    if (!openBtn || !closeBtn || !container || !dialog) return;

    function open() {
      container.classList.add('has-modal-open', 'is-menu-open');
      document.documentElement.classList.add('has-modal-open');
      dialog.setAttribute('role', 'dialog');
      dialog.setAttribute('aria-modal', 'true');
      dialog.setAttribute('aria-label', 'Menu');
      openBtn.setAttribute('aria-expanded', 'true');
      closeBtn.focus();
    }

    function close(returnFocus) {
      if (!container.classList.contains('is-menu-open')) return;
      container.classList.remove('has-modal-open', 'is-menu-open');
      document.documentElement.classList.remove('has-modal-open');
      dialog.removeAttribute('role');
      dialog.removeAttribute('aria-modal');
      dialog.removeAttribute('aria-label');
      openBtn.setAttribute('aria-expanded', 'false');
      if (returnFocus) openBtn.focus();
    }

    openBtn.addEventListener('click', open);
    closeBtn.addEventListener('click', function () { close(true); });
    container.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') close(true);
    });
    container.addEventListener('focusout', function (event) {
      if (event.relatedTarget && !container.contains(event.relatedTarget)) close(false);
    });
  });
})();
