<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

// Switch date handler for translated months and days
c::set('date.handler', 'strftime'); 
c::set('locale', 'fr_FR');
//c::set('markdown.extra', true);

// Timezone setting
c::set('timezone','Europe/Paris');

//Kirby Algolia
c::set('kirby-algolia', array(
  'algolia' => array(
    'application_id' => 'SHEMC4VFOH',
    'index' => 'devsante_dev',
    'api_key' => '***REMOVED***',
    'api_key_search_only' => '***REMOVED***' 
  ),
  'blueprints' => array(
    'article' => array(
      'fields' => array(
        'meta' => array('title', 'datetime', 'author'),
        'boost' => array('teaser'),
        'main' => array('text')
      )
    ),
    'news' => array(
      'fields' => array(
        'meta' => array('title', 'datetime', 'author'),
        'boost' => array('teaser'),
        'main' => array('text')
      )
    )
  ),
  //'debug' => array('dry_run')
));

//Latest articles
c::set('latest-content', array(
  'search_phrase' => "drépanocy",
  'length' => 1,
  'blueprint' => 'article',
  'cache_filename' => 'latest_content.txt'
));

//Redirects
c::set('redirects', array(
  'redirects_src_filename' => 'redirects_src.txt',
  'redirects_filename' => 'redirects.csv'
));

// Custom routes. Only needed once to generate the redirects from Algolia search results
// c::set('routes', array(
//   array(
//     'pattern' => 'redirects/generate',
//     'action'  => function() {
//       redirects_generate_csv();
//     }
//   )
// ));
