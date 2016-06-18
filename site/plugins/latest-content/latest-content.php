<?php

// From https://forum.getkirby.com/t/plugin-load-order/1701 Make sure the
// kirby-algolia plugin gets loaded first, as we need to update the index before
// we updated the latest articles.
$kirby_algolia = kirby()->plugin('kirby-algolia');

// Registering page hide hook (triggered when hiding a page) 
kirby()->hook('panel.page.hide', function($page) {
  $settings = c::get('latest-content');
  if($page->intendedTemplate() == $settings['blueprint']) {
    _latest_content_update($settings);
  }
});


// Registering page delete hook
kirby()->hook('panel.page.delete', function($page) {
  $settings = c::get('latest-content');
  if($page->intendedTemplate() == $settings['blueprint']) {
    _latest_content_update($settings);
  }
});


// Registering page sort hook (triggered when sorting or making a page visible)
// No need to check if the page is visible as sorting on that site is equivalent
// to publishing (un-hiding) a page. So the page will always be visible when
// this hook is called. It might also be the case on sites where sorting is
// enabled, but at that stage, I don't need to check if invisible pages can be
// sorted to resolve that issue.
kirby()->hook('panel.page.sort', function($page) {
  $settings = c::get('latest-content');
  if($page->intendedTemplate() == $settings['blueprint']) {
    _latest_content_update($settings);
  }
});


// Registering page move hook
kirby()->hook('panel.page.move', function($page, $old_page) {
  $settings = c::get('latest-content');
  if($page->isVisible() && $page->intendedTemplate() == $settings['blueprint']) {
    _latest_content_update($settings);
  }
});


// Registering page update hook
kirby()->hook('panel.page.update', function($page) {
  $settings = c::get('latest-content'); 
  if($page->isVisible() && $page->intendedTemplate() == $settings['blueprint']) {
    _latest_content_update($settings);
  }
});


/**
 * Update the on-file cache where the latest articles by search phrase are
 * stored.
 *
 * @param      string   $search_phrase  The search phrase
 * @param      integer  $limit          The limit
 */
function _latest_content_update($settings) {
  $cache_filepath = __DIR__ . '/' . c::get('latest-content')['cache_filename'];

  // Init Algolia
  $algolia_settings = c::get('kirby-algolia')['algolia'];
  $client = new \AlgoliaSearch\Client($algolia_settings['application_id'], $algolia_settings['api_key']);
  $index = $client->initIndex($algolia_settings['index']);

  // Run search
  $query_params = ['attributesToRetrieve' => '_id', 
                   'hitsPerPage' => $settings['limit'], 
                   'distinct' => 1,
                   'facetFilters' => '_blueprint:' . $settings['blueprint']];
                   
  $res = $index->search($settings['search_phrase'], $query_params);
  
  // We remove the cache file before writing the new set of hits ids.
  // Technically, a home page could be generated when the file does not exist,
  // which would result in an empty block. Chances are near impossible though.
  f::remove($cache_filepath);
  
  // Writing the hits ids in the cache file
  if(!empty($res['hits'][0])) {
    foreach($res['hits'] as $hit) {
      f::write($cache_filepath, $hit['_id'], true);
    }
  }
}


/**
 * Returns an array of the most relevant pages for the configured search phrase
 *
 * The fragments ID from which the pages build are built are parsed from a text
 * file acting as a cache.
 *
 * @return     array  The pages collection
 */
function latest_content_get_pages() {
  $cache_filepath = __DIR__ . '/' . c::get('latest-content')['cache_filename'];

  $pages = new Pages();

  if(f::exists($cache_filepath)) {
    // Read every line to extract the page id from the fragment id (fragment ID = page-ID#hash)
    $handle = fopen($cache_filepath, "r");
    if ($handle) {
      while (($fragment_id = fgets($handle)) !== false) {
        $pages->add(page(strtok($fragment_id, '#')));
      }
    }
    fclose($handle);
  }

  return $pages;
}
?>