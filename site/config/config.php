<?php

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
c::set('locale', 'fr_FR.utf8');
//c::set('markdown.extra', true);

// Timezone setting
c::set('timezone','Europe/Paris');

//Kirby Algolia
c::set('kirby-algolia', array(
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
  )
));

//Latest articles
c::set('latest-content', array(
  'search_phrase' => "drepanocy",
  'length' => 1,
  'blueprint' => 'article',
  'cache_filename' => 'latest_content.txt'
));

// Redirects
c::set('redirects', array(
  'redirects_filename' => 'redirects.csv'
));

// Server push headers (filename are fingerprinted during deployment)
c::set('headers', array(
  'home' => function($page) {
    header('Link: </assets/css/app.css>; rel=preload; as=style, </assets/js/app.js>; rel=preload; as=script');
  }
));

// Include a local config file if it exists
$local_config = __DIR__ . '/local.config.php';
if (file_exists($local_config)) {
  include $local_config;
}