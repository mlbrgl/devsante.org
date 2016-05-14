<?php

/* 
line
line
--> sending off paragraph
# heading
line
--> sending off paragraph
## heading
line
line
--> sending off paragraph
# unlikely heading
--> sending off paragraph by code convenience but very little value
*/

namespace AlgoliaKirby;


class Parser {

  private $type;
  // private $textfile;
  // private $pageid;
  private $page;
  //DEBUG
  private $debug_path; 

  public function __construct($page, $fields, $type = 'fragment'){
    $this->type = $type;
    $this->page = $page;

    //DEBUG 
    $this->debug_path = __DIR__ . '/sent-to-indexing.txt';
    if(\f::exists($this->debug_path)){
      \f::remove($this->debug_path);
    }
  }

  public function parse() {
    //$handle = fopen($this->page->textfile(), 'r');

    switch ($this->type) {
      case 'fragment':
        // Start breaking up the textarea string line by line
        $line = strtok($this->page->text(), PHP_EOL);
        while ($line  !== false) {
          if(preg_match('/^(#+)\s(.*)$/', $line, $matches)) {
            // A new heading has been found. A new fragment can be prepared...
            // ... but before that, we need to send the previous completed fragment off to indexing 
            // If the text starts with a heading, then this first fragment will be empty and we will
            // not index it.
            if(!empty($fragment)) $this->index($fragment);
            // Starting new fragment
            $fragment = array();
            $fragment['id'] = $this->page->id() . '#' . \str::slug($fragment['heading']);
            $fragment['page_title'] = $this->page->title();
            $fragment['heading'] = $matches[2];
            // The importance can be used in Algolia as a business metric. It is based on the heading
            // level. h1 -> importance : 1, h2 -> importance : 2, etc ...
            // https://blog.algolia.com/how-to-build-a-helpful-search-for-technical-documentation-the-laravel-example/
            $fragment['importance'] = strlen($matches[1]);
          } else {
            $fragment['text'] .= $line . PHP_EOL;
          }
          $line = strtok(PHP_EOL);
        }
        // while (($line = fgets($handle)) !== false) {
        //   if(preg_match('/^(#+)\s(.*)$/', $line, $matches)) {
        //     // A new heading has been found. A new fragment can be prepared...
        //     // ... but before that, we need to send the previous completed fragment off to indexing 
        //     // If the text starts with a heading, then this first fragment will be empty and we will
        //     // not index it.
        //     if(!empty($fragment)) $this->index($fragment);
        //     // Starting new fragment
        //     $fragment = array();
        //     $fragment['id'] = $this->page->id() . '#' . \str::slug($fragment['heading']);
        //     $fragment['page_title'] = $this->page->title();
        //     $fragment['heading'] = $matches[2];
        //     // The importance can be used in Algolia as a business metric. It is based on the heading
        //     // level. h1 -> importance : 1, h2 -> importance : 2, etc ...
        //     // https://blog.algolia.com/how-to-build-a-helpful-search-for-technical-documentation-the-laravel-example/
        //     $fragment['importance'] = strlen($matches[1]);
        //   } else {
        //     $fragment['text'] .= $line . PHP_EOL;
        //   }
        // }
        //TODO index at the end
        break;

      default:
        break;
    }

    // fclose($handle);

  }

  private function index($record) {
    \f::write($this->debug_path, '##BEGIN##' . PHP_EOL, true);
    foreach($record as $field => $value) {
      \f::write($this->debug_path, $field . kirbytext($value) . PHP_EOL, true);
    }
    \f::write($this->debug_path, '##END##', true);
    // TODO send to Algolia
  }
  
}

?>