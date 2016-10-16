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
<body<?php ecco(isset($context), ' class="' . $context . '"');?>>
  
  <header class="header cf" role="banner">
    
    <div id="top">

      <div class="container wide">

        <div class="content">
          <div class="line">
            <a href="/articles"> 
              <span class="i-quill icon"></span>
              <span class="title">ARTICLES</span>
            </a>
            <a href="/actualites"> 
              <span class="i-newspaper icon"></span>
              <span class="title">ACTUALITES</span>
            </a>
            <a href="/l-association"> 
              <span class="i-briefcase icon"></span>
              <span class="title">L'ASSOCIATION</span>
            </a>
          </div>
          <div class="line">
            <a href="/?q=drépano" class="main-theme"> 
              <span class="i-quill icon"></span>
              <span class="title">ARTICLES DRÉPANOCYTOSE</span>
            </a>
          </div>
        </div>

        <?php /* <a href="#" class="i-facebook icon"></a> */ ?>

      </div>
    
    </div>

    <div class="logo"><a href="/">
      <a href="<?php echo url() ?>">
        <img src="<?php echo url('assets/img/logo.svg') ?>" alt="<?php echo $site->title()->html() ?>" />
      </a>
    </div>

    <?php if(isset($context) && $context == 'home'): ?>
      <div id="baseline" class="container wide">
        <div class="line first">Information permanente&nbsp;</div>
        <div class="line last">des acteurs de la santé</div>
      </div>
    <?php endif; ?> 

  </header>

  <?php snippet('search'); ?>