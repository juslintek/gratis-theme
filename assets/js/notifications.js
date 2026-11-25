/* GRATIS Async Notifications — toast + bell, zero dependencies, ~3KB */
(function() {
  'use strict';

  var TOAST_TYPES = { success: '✓', error: '✕', info: 'ℹ', warning: '⚠' };

  function normalizeType(type) {
    return Object.prototype.hasOwnProperty.call(TOAST_TYPES, type) ? type : 'info';
  }

  function safeLink(raw) {
    if (typeof raw !== 'string') return '#';
    var trimmed = raw.trim();
    if (/^(https?:\/\/|\/(?!\/)|#)/i.test(trimmed)) {
      return trimmed;
    }
    return '#';
  }

  function toast(message, type, duration) {
    var safeType = normalizeType(type || 'info');
    var delay = typeof duration === 'number' ? duration : 4000;

    var container = document.getElementById('gratis-toasts');
    if (!container) {
      container = document.createElement('div');
      container.id = 'gratis-toasts';
      container.setAttribute('role', 'status');
      container.setAttribute('aria-live', 'polite');
      document.body.appendChild(container);
    }

    var el = document.createElement('div');
    el.className = 'gratis-toast gratis-toast--' + safeType;

    var icon = document.createElement('span');
    icon.className = 'gratis-toast-icon';
    icon.setAttribute('aria-hidden', 'true');
    icon.textContent = TOAST_TYPES[safeType];

    var msg = document.createElement('span');
    msg.className = 'gratis-toast-msg';
    msg.textContent = String(message == null ? '' : message);

    var closeBtn = document.createElement('button');
    closeBtn.type = 'button';
    closeBtn.className = 'gratis-toast-close';
    closeBtn.setAttribute('aria-label', 'Close');
    closeBtn.textContent = '×';
    closeBtn.addEventListener('click', function() {
      dismiss(el);
    });

    el.appendChild(icon);
    el.appendChild(msg);
    el.appendChild(closeBtn);
    container.appendChild(el);

    requestAnimationFrame(function() {
      el.classList.add('gratis-toast--visible');
    });

    if (delay > 0) {
      setTimeout(function() {
        dismiss(el);
      }, delay);
    }
    return el;
  }

  function dismiss(el) {
    el.classList.remove('gratis-toast--visible');
    el.addEventListener('transitionend', function() {
      el.remove();
    }, { once: true });
  }

  // ── Bell notification system ──────────────────────────────────────────────
  var bellCount = 0;

  function setPanelState(bell, panel, badge, open) {
    panel.classList.toggle('gratis-bell-panel--open', open);
    bell.setAttribute('aria-expanded', open ? 'true' : 'false');
    if (open) {
      bellCount = 0;
      if (badge) {
        badge.textContent = '';
        badge.classList.remove('gratis-bell-badge--active');
      }
    }
  }

  function initBell() {
    var bells = document.querySelectorAll('.gratis-bell');
    bells.forEach(function(bell) {
      var badge = bell.querySelector('.gratis-bell-badge');
      var panel = bell.querySelector('.gratis-bell-panel');
      if (!panel) return;

      if (bell.tagName !== 'BUTTON') {
        bell.setAttribute('role', 'button');
        if (!bell.hasAttribute('tabindex')) {
          bell.setAttribute('tabindex', '0');
        }
      }
      bell.setAttribute('aria-expanded', panel.classList.contains('gratis-bell-panel--open') ? 'true' : 'false');

      function toggle() {
        var isOpen = panel.classList.contains('gratis-bell-panel--open');
        setPanelState(bell, panel, badge, !isOpen);
      }

      bell.addEventListener('click', function(e) {
        e.stopPropagation();
        toggle();
      });

      bell.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          e.stopPropagation();
          toggle();
        }
      });

      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && panel.classList.contains('gratis-bell-panel--open')) {
          e.preventDefault();
          setPanelState(bell, panel, badge, false);
          bell.focus();
        }
      });

      document.addEventListener('click', function(e) {
        if (!bell.contains(e.target)) {
          setPanelState(bell, panel, badge, false);
        }
      });
    });
  }

  function addNotification(message, type, link) {
    var safeType = normalizeType(type || 'info');
    bellCount++;
    var bells = document.querySelectorAll('.gratis-bell');
    bells.forEach(function(bell) {
      var badge = bell.querySelector('.gratis-bell-badge');
      var list = bell.querySelector('.gratis-bell-list');
      if (badge) {
        badge.textContent = bellCount > 9 ? '9+' : String(bellCount);
        badge.classList.add('gratis-bell-badge--active');
      }
      if (list) {
        var item = document.createElement('a');
        item.className = 'gratis-bell-item gratis-bell-item--' + safeType;
        item.href = safeLink(link);

        var dot = document.createElement('span');
        dot.className = 'gratis-bell-dot';

        var text = document.createElement('span');
        text.textContent = String(message == null ? '' : message);

        var time = document.createElement('time');
        time.textContent = new Date().toLocaleTimeString();

        item.appendChild(dot);
        item.appendChild(text);
        item.appendChild(time);
        list.prepend(item);

        while (list.children.length > 10) {
          list.lastChild.remove();
        }
      }
    });
    toast(message, safeType, 3000);
  }

  // ── WooCommerce cart events ───────────────────────────────────────────────
  document.addEventListener('added_to_cart', function() {
    addNotification('Item added to cart!', 'success', '/cart');
  });

  // ── Expose API ────────────────────────────────────────────────────────────
  window.GRATIS = window.GRATIS || {};
  window.GRATIS.toast = toast;
  window.GRATIS.notify = addNotification;

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initBell);
  } else {
    initBell();
  }
})();
