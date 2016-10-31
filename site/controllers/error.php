<?php

return function($site, $pages, $page) {
     
  $redirects_filepath = __DIR__ . '/../plugins/redirects/' . c::get('redirects')['redirects_filename'];

  if(f::exists($redirects_filepath)) { 

    // Get the path originally requested
    $path_requested = '/' . $site->kirby()->request()->path();
    // Load the file containing the redirects
    $redirects = f::read($redirects_filepath);   

    // Read the src redirects, one line at a time to try and find 
    // a matching one
    $redirect = strtok($redirects, PHP_EOL);
    while($redirect != false) {
      
      $redirect_src_dest = explode(',', $redirect);
      
      if($redirect_src_dest[0] === $path_requested) {
        // If a matching redirect if found, go there
        go($redirect_src_dest[1]);
      } else {
        // Read the next src redirect
        $redirect = strtok(PHP_EOL);
      }
    }
  }



  
  // // Optimistically try to locate the page by using the same slug as the previous site
  // $new_page = $site->index()->visible()->find('articles/' . $slug, 'actualites/' . $slug)->first();
  
  // if(empty($new_page)) {
  //   print 'could not find it, starting searching ...' . '<br>';

  //   $search_phrase = str_replace('-', ' ', $slug);
  //   print 'search phrase: ' . $search_phrase  . '<br>';

  //   // Search for the page based on its slug the page is being requested with
  //   $new_pages = $site->index()->visible()->search($search_phrase, 'title'); 

  //   foreach($new_pages as $new_page) {
  //     echo $new_page->title() . '<br>';
  //   }
  // }

  // // No guarantee that the search above actually found a record, so we still
  // // need to check before redirecting.
  // if(!empty($new_page)) {
  //   print 'redirecting now ...' . '<br>';
  //   echo $new_page->title() . '<br>';
  //   // go($new_page->url(), 301);
  // }

  return array();
};

?>