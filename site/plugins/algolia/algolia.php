<?php

require __DIR__ . '/vendor/autoload.php';


kirby()->hook('panel.page.update', function($page) {
  
  // fields to index
  // TODO load from config
  // Suggestion: new field method to grab that info directly from the blueprint
  // altough in some instances you might need to override it nevertheless
  $fields = array('title' => 'string', 'datetime' => 'date', 'teaser' => 'textarea', 'text' => 'textarea');

  $parser = new \AlgoliaKirby\Parser($page, $fields, 'fragment');
  $parser->parse();


});


?>