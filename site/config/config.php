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
    ),
    'quiz' => array(
      'fields' => array(
        'meta' => array('title', 'datetime', 'author'),
        'boost' => array('teaser'),
        'main' => array('text')
      )
    )
  )
));

// Server push headers (filename are fingerprinted during deployment)
if(strpos($_SERVER['REQUEST_URI'],"/panel") !== 0) {
  header('Link: </assets/css/app.css>; rel=preload; as=style, </assets/js/app.js>; rel=preload; as=script');
}

$config = [
  'cache' => [
    'pages' => [
      'active' => true,
    ]
  ]    
];
    
// Include a local config file if it exists
$local_config = F::load(__DIR__ . '/local.config.php', []);

return array_merge($config, $local_config);