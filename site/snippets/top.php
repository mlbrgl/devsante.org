<!DOCTYPE html>
<html lang="fr">
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

  <div class="header-search">

    <header class="header cf">

      <?php pattern('menu-icon'); ?>

      <?php pattern('menu'); ?>

      <div class="logo">
        <a href="<?php echo url() ?>">
          <img src="<?php echo url('assets/img/logo.svg') ?>" alt="<?php echo $site->title()->html() ?>" />
        </a>
      </div>

      <?php if(isset($context) && $context == 'home'): ?>
        <div id="baseline">
          Information permanente <br/>des acteurs de la santé
        </div>
      <?php endif; ?>

    </header>

    <?php snippet('search'); ?>

  </div>
