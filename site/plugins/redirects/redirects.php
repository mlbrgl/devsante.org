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
  $query_params = ['attributesToRetrieve' => '_id,datetime',
                   'restrictSearchableAttributes' => 'datetime',
                   'length' => 1,
                   'offset' => 0, // without 'offset', 'length' is not considered
                  ];

  // Load the file containing the src of the redirects
  $redirects_src = f::read($redirects_src_filepath);

  // Remove the redirects file before writing the new set of hits ids
  f::remove($redirects_filepath);

  // Read the src redirects, one line at a time
  $redirect_src_url_date = strtok($redirects_src, PHP_EOL);
  while($redirect_src_url_date != false) {
    // Searching by keywords (not precise enough)
    // $search_phrase = str_replace('-', ' ', basename($redirect_src_url_date));
    
    // Searching by datetime, making the assumption that no 2 articles were written on the same day
    // $query_params['filters' => 'datetime: ' . trim(explode(',', $redirect_src_url_date)[1])]; 
    
    $search_phrase = trim(explode(',', $redirect_src_url_date)[1]); 

    // Run the search against Algolia index
    $res = $index->search($search_phrase, $query_params);

    // f::write($redirects_filepath, $redirect_src_url_date . ',' . $search_phrase . PHP_EOL, true);
    
    $redirect_dest_url = ' ';
    $redirect_dest_datetime = ' ';

    if(isset($res['hits'][0]['_id'])) {
      // Algolia returns the full id, which contains the # to uniquely identify the paragraph
      $res_id = $res['hits'][0]['_id'];
      $redirect_dest_url = explode('#', $res_id)[0];
    }

    if(isset($res['hits'][0]['datetime'])) {
      $redirect_dest_datetime = date('d F Y', $res['hits'][0]['datetime']);
    }

    f::write($redirects_filepath, $redirect_src_url_date . ',' . $redirect_dest_url . ',' . $redirect_dest_datetime .  PHP_EOL, true);

    // Read the next src redirect
    $redirect_src_url_date = strtok(PHP_EOL);
  }

}