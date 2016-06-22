<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

  <?php echo css('assets/css/app.css') ?>
  <?php echo css('//fonts.googleapis.com/css?family=Open+Sans:400,400italic,700') ?>
  <?php echo css('assets/fonts/devsante/style.css'); ?>
  <?php echo css('//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css'); ?>


</head>
<body>
  
  <header class="header cf" role="banner"></header>

  <div id="search">
    <div class="container wide">
      <div class="search-box">
        <span class="i-search"></span>
        <div class="search-input"></div>
      </div>
    </div>
  </div>
  
  
  <div class="container" id="search-hits">
    <div class="content"></div>
  </div>