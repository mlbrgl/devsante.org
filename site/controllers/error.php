<?php

return function($site, $pages, $page) {
     
  $redirects_filepath = __DIR__ . '/../plugins/redirects/' . c::get('redirects')['redirects_filename'];

  // Not necessary - might be useful for performance, not checked
  // // Optimistically try to locate the page by using the same slug as the previous site
  // $slug = $site->kirby()->request()->path()->last();
  // $new_page = $site->index()->visible()->find('articles/' . $slug, 'actualites/' . $slug)->first();
  // if(!emtpy($new_page)) {
  //   echo $new_page->title() . '<br>';
  //   // go($new_page->url(), 301);
  // } elseif (f::exists($redirects_filepath)) { 
  // 
  if (f::exists($redirects_filepath)) { 
    
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
        go($redirect_src_dest[1], 301);
      } else {
        // Read the next src redirect
        $redirect = strtok(PHP_EOL);
      }
    }
  }

  return array();
};

?>