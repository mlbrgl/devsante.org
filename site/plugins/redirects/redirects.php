<?php

require __DIR__ . '/vendor/autoload.php';

function redirects_generate_csv() {
  $redirects_src_filepath = __DIR__ . '/' . c::get('redirects')['redirects_src_filename'];
  $redirects_filepath = __DIR__ . '/' . c::get('redirects')['redirects_filename'];

  // Init Algolia
  $algolia_settings = c::get('kirby-algolia')['algolia'];
  $client = new \AlgoliaSearch\Client($algolia_settings['application_id'], $algolia_settings['api_key_search_only']);
  $index = $client->initIndex($algolia_settings['index']);

  // Set parameters for search
  $query_params = ['attributesToRetrieve' => '_id', 
                   'length' => 1,
                   'offset' => 0, // without 'offset', 'length' is not considered
                  ];

  // Load the file containing the src of the redirects
  $redirects_src = f::read($redirects_src_filepath);

  // Remove the redirects file before writing the new set of hits ids
  f::remove($redirects_filepath);

  // Read the src redirects, one line at a time
  $redirect_src = strtok($redirects_src, PHP_EOL);
  while($redirect_src != false) {
    $search_phrase = str_replace('-', ' ', basename($redirect_src));
    
    // Run the search against Algolia index
    $res = $index->search($search_phrase, $query_params);

    // f::write($redirects_filepath, $redirect_src . ',' . $search_phrase . PHP_EOL, true);
   
    // Only write in the redirects file if Algolia returns a search result
    if(isset($res['hits'][0]['_id'])) {

      // Algolia returns the full id, which contains the # to uniquely identify the paragraph
      $res_id = $res['hits'][0]['_id'];
      $redirect_dest = explode('#', $res_id)[0];
      
      f::write($redirects_filepath, $redirect_src . ',' . $redirect_dest . PHP_EOL, true);
    }

    // Read the next src redirect
    $redirect_src = strtok(PHP_EOL);
  }

}