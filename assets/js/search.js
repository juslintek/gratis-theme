/* GRATIS Live Search — zero dependencies, ~2KB */
(function() {
  'use strict';

  function decodeEntities(str) {
    var text = String(str || '');
    if (!text) return '';
    if (typeof DOMParser !== 'undefined') {
      var doc = new DOMParser().parseFromString(text, 'text/html');
      return doc.documentElement.textContent || '';
    }
    var ta = document.createElement('textarea');
    ta.textContent = text;
    return ta.value;
  }

  function safeUrl(raw) {
    if (typeof raw !== 'string') return '#';
    var trimmed = raw.trim();
    if (/^(https?:\/\/|\/(?!\/))/i.test(trimmed)) {
      return trimmed;
    }
    return '#';
  }

  function setStatus(results, message, query) {
    results.textContent = '';
    var box = document.createElement('div');
    box.className = message === 'Searching…' ? 'gratis-search-loading' : 'gratis-search-empty';
    box.setAttribute('role', 'status');
    if (query) {
      box.appendChild(document.createTextNode('No results for "'));
      var strong = document.createElement('strong');
      strong.textContent = query;
      box.appendChild(strong);
      box.appendChild(document.createTextNode('"'));
    } else {
      box.textContent = message;
    }
    results.appendChild(box);
  }

  function init() {
    var inputs = document.querySelectorAll('.gratis-search-input');
    inputs.forEach(attachSearch);
  }

  function attachSearch(input) {
    var wrap = input.closest('.gratis-search-wrap');
    if (!wrap) return;

    var results = wrap.querySelector('.gratis-search-results');
    if (!results) {
      results = document.createElement('div');
      results.className = 'gratis-search-results';
      wrap.appendChild(results);
    }
    if (!results.id) {
      results.id = 'gratis-search-results-' + Math.random().toString(36).slice(2, 8);
    }
    results.setAttribute('role', 'listbox');
    results.setAttribute('aria-live', 'polite');
    results.hidden = true;

    input.setAttribute('aria-controls', results.id);
    input.setAttribute('aria-expanded', 'false');

    var timer;
    var controller;

    input.addEventListener('input', function() {
      var q = this.value.trim();
      clearTimeout(timer);
      if (q.length < 2) {
        results.hidden = true;
        input.setAttribute('aria-expanded', 'false');
        return;
      }
      timer = setTimeout(function() {
        search(q, results, input);
      }, 200);
    });

    input.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        results.hidden = true;
        input.setAttribute('aria-expanded', 'false');
        this.blur();
      }
    });

    document.addEventListener('click', function(e) {
      if (!wrap.contains(e.target)) {
        results.hidden = true;
        input.setAttribute('aria-expanded', 'false');
      }
    });

    async function search(q, resultsEl, inputEl) {
      if (typeof AbortController !== 'undefined') {
        if (controller) controller.abort();
        controller = new AbortController();
      }

      setStatus(resultsEl, 'Searching…');
      resultsEl.hidden = false;
      inputEl.setAttribute('aria-expanded', 'true');

      try {
        var base = (window.gratisSearch && window.gratisSearch.restUrl) || '/wp-json/wp/v2/';
        var nonce = (window.gratisSearch && window.gratisSearch.nonce) || '';
        var url = base + 'search?search=' + encodeURIComponent(q) + '&per_page=6&_fields=id,title,url,subtype';
        var r = await fetch(url, {
          signal: controller ? controller.signal : undefined,
          headers: { 'X-WP-Nonce': nonce }
        });
        if (!r.ok) {
          throw new Error('HTTP ' + r.status);
        }
        var data = await r.json();

        if (!Array.isArray(data) || !data.length) {
          setStatus(resultsEl, 'empty', q);
          return;
        }

        resultsEl.textContent = '';
        var frag = document.createDocumentFragment();
        data.forEach(function(item) {
          var link = document.createElement('a');
          link.className = 'gratis-search-item';
          link.setAttribute('role', 'option');
          link.href = safeUrl(item && item.url);

          var typeEl = document.createElement('span');
          typeEl.className = 'gratis-search-type';
          typeEl.textContent = (item && item.subtype) ? String(item.subtype) : 'page';

          var rawTitle = item && item.title && typeof item.title === 'object'
            ? item.title.rendered
            : (item ? item.title : '');
          var titleEl = document.createElement('span');
          titleEl.className = 'gratis-search-title';
          titleEl.textContent = decodeEntities(rawTitle);

          link.appendChild(typeEl);
          link.appendChild(titleEl);
          frag.appendChild(link);
        });
        resultsEl.appendChild(frag);
      } catch (e) {
        if (e && e.name !== 'AbortError') {
          setStatus(resultsEl, 'Search unavailable');
        }
      }
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
