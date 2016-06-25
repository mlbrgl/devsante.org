var search = instantsearch({
  appId: 'BY1JXTA0MV',
  apiKey: '3a6b04066a48eed19634129870e8e8f1',
  indexName: 'devsante',
  urlSync: true,
  searchFunction: search
});

search.addWidget(
  instantsearch.widgets.searchBox({
    container: '#search .search-input',
    placeholder: 'Rechercher ...'
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
      item: '<article class="result-item">' + 
              '<h1><a href="/{{_id}}">{{{_highlightResult.title.value}}}</a></h1>' +
              '<div class="date">{{datetime}}</div>' +
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


function transform_data_item(item) {
  console.log(item);
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
  var curr_date = new Date(timestamp);
  date_string = curr_date.toLocaleDateString();

  // TODO test fallback for older IE
  if(!date_string) {
    var curr_day = curr_date.getDate();
    var curr_month = curr_date.getMonth() + 1 ;
    var curr_year = curr_date.getFullYear();
    date_string = curr_day + '/' + curr_month + '/' +  curr_year;
  }

return date_string;
}



search.start();

function search(helper) {  
  // Init search
  var search_hits = document.getElementById('search-hits');
  var body = document.getElementsByTagName('body')[0];
  var search_class = 'search';
  

  if(helper.state.query !== '') {
    //helper.search({hitsPerPage: 5});
    helper.search();

    // Turn on "search mode"
    if(!body.classList.contains(search_class)) {
      body.classList.add(search_class);
    }
    search_hits.style.display = '';

    // TODO change style of search bar (blue, bigger)

  } else {
    // Turn off "search mode"
    if(body.classList.contains(search_class)) {
      body.classList.remove(search_class);
    }
    // Hide the results
    search_hits.style.display = 'none';
  }
}
