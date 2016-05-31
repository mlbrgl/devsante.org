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
    templates: {
      item: '<article class="result-item">' + 
              '<h1><a href="/{{_id}}">{{{_highlightResult._heading.value}}}</a></h1>' + 
              '<div class="text">[...] {{{_snippetResult._content.value}}} [...]</div>' +
              '<div class="title"><a href="/{{_id}}">{{title}}</a></div>' +
            '</article>'
    },
    //hitsPerPage: 5
  })
);


search.start();

function search(helper) {  
  // Init search
  $search_input = document.querySelectorAll('#search input')[0];
  if($search_input.value) {
    console.log(helper.state.hitsPerPage);
    //helper.search({hitsPerPage: 5});
    helper.search();
  }
}



