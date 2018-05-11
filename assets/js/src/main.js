// Algolia variables are set in bottom.php
var search = instantsearch({
  appId: algolia_appId,
  apiKey: algolia_apiKey,
  indexName: algolia_indexName,
  urlSync: true,
  // Replace with following line to debounce search and add lodash (custom
  // package with debounce only) back in src folder
  // searchFunction: _.debounce(search_func, 200),
  searchFunction: search_func,
  searchParameters: {
    distinct: 2
  }
});

search.addWidget(
  instantsearch.widgets.searchBox({
    container: '#search .search-input',
    placeholder: 'votre recherche',

  })
);

search.addWidget(
  instantsearch.widgets.hits({
    container: '#search-hits .content',
    transformData: {
      item: function(item) {
        item.datetime = get_locale_date_string_fallback(item.datetime * 1000);

        // Removing metadata for subsequent paragraphs in the search
        if(item._distinctSeqID !== 0) {
          delete item._highlightResult.title;
          delete item.author;
          delete item.datetime;
        }

        return item;
      }
    },
    templates: {
      item: '<article>' +
              '{{#_highlightResult.title}}' +
                '<h1><a href="/{{_id}}">{{{_highlightResult.title.value}}}</a></h1>' +
              '{{/_highlightResult.title}}' +
              '{{#datetime}}' +
                '<div class="date">{{datetime}}</div>' +
              '{{/datetime}}' +
              '{{#author}}' +
                '<div class="author">{{author}}</div>' +
              '{{/author}}' +
              '{{#_highlightResult._heading.value}}' +
                '<div class="heading"><a href="/{{_id}}">{{{_highlightResult._heading.value}}}</a></div>' +
              '{{/_highlightResult._heading.value}}'+
              '{{#_snippetResult._content.value}}' +
                '<div class="text"><a href="/{{_id}}">[...] {{{_snippetResult._content.value}}} [...] </a></div>' +
              '{{/_snippetResult._content.value}}' +
            '</article>',
      empty: 'Votre recherche n\' a retourné aucun résultat'
    },
    hitsPerPage: 5
  })
);

// Pagination widget
search.addWidget(
  instantsearch.widgets.pagination({
    container: '#search-pagination',
    maxPages: 20,
    showFirstLast: false,
    padding: 2
  })
);

// Configuration widget replaced with searchParameters as per
// https://github.com/algolia/instantsearch.js/issues/1463
// search.addWidget({
//   init: function(args) {
//     args.helper.setQueryParameter('distinct', 2);
//   }
// });

search.start();


/**
 * Search callback
 *
 * @param      {string}  helper  The helper
 */
function search_func(helper) {
  if(helper.state.query !== '') {
    search_mode('on');
    helper.search();

    // TODO change style of search bar (blue, bigger)
  }
}


/**
 * Show / hide search elements
 *
 * @param      on|off  search_is  Search status
 */
function search_mode(search_is) {
  var search_hits = document.getElementById('search-hits');
  var body = document.getElementsByTagName('body')[0];
  var cancel_search = document.querySelectorAll('#search .search-cancel')[0];
  var search_class = 'search';

  // Turn search mode on
  if(search_is == 'on') {
    if(!body.classList.contains(search_class)) {
      body.classList.add(search_class);
    }
    search_hits.style.display = '';
    cancel_search.style.display = 'block';
  // Turn search mode off
  } else {
    if(body.classList.contains(search_class)) {
      body.classList.remove(search_class);
    }
    search_hits.style.display = 'none';
    cancel_search.style.display = 'none';
  }
}


/**
 * Clear text from the search input
 *
 * @param      {<type>}  event   The event
 */
function clear_search(event) {
  event.preventDefault();

  var search_input = document.querySelectorAll('#search .ais-search-box--input')[0];
  search_input.value = '';

  search_mode('off');
}


/**
 * Returns a formatted representation of the timestamp.
 *
 * Provides also a fallback for IE
 *
 * @param      string         $timestamp  The timestamp
 * @return     Date|string    The formatted date (currently dd/mm/yyyy)
 */
function get_locale_date_string_fallback(timestamp) {
  if (typeof timestamp !== 'undefined') {
    var curr_date = new Date(timestamp);
    date_string = curr_date.toLocaleDateString();

    // TODO test fallback for older IE
    if(!date_string) {
      var curr_day = curr_date.getDate();
      var curr_month = curr_date.getMonth() + 1 ;
      var curr_year = curr_date.getFullYear();
      date_string = curr_day + '/' + curr_month + '/' +  curr_year;
    }
  } else {
    date_string = '';
  }

return date_string;
}

/**
 * Animate mobile menu
 */

var menu_icon = document.querySelector('.menu-icon');
var menu_overlay = document.querySelector('#menu-overlay');

function toggle_menu() {
  // Toggle open mode
  menu_icon.classList.toggle('open');
  document.querySelector('nav#menu').classList.toggle('open');
  document.querySelector('header').classList.toggle('open');

  // Prevent background body scrolling
  document.querySelector('body').classList.toggle('navigation-open');
  document.querySelector('html').classList.toggle('navigation-open');

  // Toggle overlay
  menu_overlay.classList.toggle('visible');
}

menu_icon.addEventListener('click', toggle_menu);

/**
 * Hide header on scroll
 */

var header = document.querySelector('.header-search');

var headroom  = new Headroom(header
  //, {
  // Headroom config options
  // }
);
headroom.init();

/**
 * Handle cookie bar
 */

var cookie_bar = document.querySelector('#cookie-bar');
var cookie_bar_cta = cookie_bar.getElementsByClassName('cta')[0];

if (!Cookies.get('hide-cookie-consent-until') || Date.now() > Cookies.get('hide-cookie-consent-until')) {
  cookie_bar.classList.add('visible');
  cookie_bar_cta.addEventListener('click', function(e) {
    e.preventDefault();
    cookie_bar.classList.remove('visible');
    Cookies.set('hide-cookie-consent-until', Date.now() + 365 * 24 * 3600 * 1000, {expire: 365});
  })
}

/**
 * Handle survey
 */

var survey = document.querySelector('#survey');
var survey_ok = survey.getElementsByClassName('ok')[0];
var survey_later = survey.getElementsByClassName('later')[0];

function hide_survey(status) {
  survey.classList.remove('visible');
  var timestamp_show_next = (status === 'answered') ? Date.now() + 365 * 24 * 3600 * 1000 : Date.now() + 1 * 24 * 3600 * 1000
  Cookies.set('hide-survey-until', timestamp_show_next, {expires: 365});
}

if (!Cookies.get('hide-survey-until') || Date.now() > Cookies.get('hide-survey-until')) {
  survey.classList.add('visible');
  survey_ok.addEventListener('click', function(e) {
    hide_survey('answered');
  })
  survey_later.addEventListener('click', function(e) {
    e.preventDefault();
    hide_survey('postponed');
  })
}

/**
 * Masonry homepage
 */

var grid = document.querySelector('.latest-content');
if (grid !== null) {
  var msnry = new Masonry(grid, {
    itemSelector: '.excerpt',
    columnWidth: '.excerpt',
    gutter: '.gutter-sizer',
    percentPosition: true,
    transitionDuration: 0,
  });
}
