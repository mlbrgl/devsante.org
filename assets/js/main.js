var search = instantsearch({
  appId: 'SHEMC4VFOH',
  apiKey: '64bcff507de4b92b2e55267b9a336f1c',
  indexName: 'devsante',
  urlSync: true,
  searchFunction: search
});

search.addWidget(
  instantsearch.widgets.searchBox({
    container: '#search .search-input',
    placeholder: 'votre recherche'
  })
);

search.addWidget(
  instantsearch.widgets.hits({
    container: '#search-hits .content',
    transformData: {
      item: function(item) {
        item.datetime = get_locale_date_string_fallback(item.datetime * 1000);
        return item;
      }
    },
    templates: {
      item: '<article>' + 
              '<h1><a href="/{{_id}}">{{{_highlightResult.title.value}}}</a></h1>' +
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
                '<div class="text">[...] {{{_snippetResult._content.value}}} [...]</div>' +
              '{{/_snippetResult._content.value}}' +
            '</article>',
      empty: 'Votre recherche n\' a retourné aucun résultat'
    }
    // hitsPerPage: 2,
  })
);


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


search.start();


/**
 * Search callback
 *
 * @param      {string}  helper  The helper
 */
function search(helper) {  
  if(helper.state.query !== '') {
    //helper.search({hitsPerPage: 5});
    helper.search();
    search_mode('on');
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
