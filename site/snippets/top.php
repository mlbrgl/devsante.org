<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

  <?php echo css('assets/css/app.css') ?>
  <?php echo css('//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css'); ?>


</head>
<body<?php echo isset($context) ? ' class="' . $context . '"' : '';?>>
  
  <header class="header cf" role="banner">
    
    <div id="menu">

      <ul class="menu-row">
        <li>
          <a href="/articles"> 
            <span class="i-quill icon"></span>
            <span class="title">ARTICLES</span>
          </a>
        </li>
        <li>
          <a href="/actualites"> 
            <span class="i-newspaper icon"></span>
            <span class="title">ACTUALITES</span>
          </a>
        </li>
        <li class="last">
          <a href="/l-association"> 
            <span class="i-briefcase icon"></span>
            <span class="title">ASSOCIATION</span>
          </a>
        </li>
      </ul>
      <ul class="menu-row">
        <li class="last">
          <a href="/?q=drépano" class="main-theme"> 
            <span class="i-quill icon"></span>
            <span class="title">ARTICLES DRÉPANOCYTOSE</span>
          </a>
        </li>
      </ul>

        <?php /* <a href="#" class="i-facebook icon"></a> */ ?>
    
    </div>

    <div class="logo"><a href="/">
      <a href="<?php echo url() ?>">
        <img src="<?php echo url('assets/img/logo.svg') ?>" alt="<?php echo $site->title()->html() ?>" />
      </a>
    </div>

    <?php if(isset($context) && $context == 'home'): ?>
      <div id="baseline">
        Information permanente des acteurs de la santé
      </div>
    <?php endif; ?> 

  </header>

  <?php snippet('search'); ?>