<!DOCTYPE html>
<html lang="fr">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

  <?php echo css('assets/css/app.css') ?>

</head>
<body<?php echo isset($context) ? ' class="' . $context . '"' : '';?>>

  <div class="header-search">

    <header class="header cf">

      <?php pattern('menu'); ?>

      <?php pattern('menu-icon'); ?>

      <div id="baseline">
        Formation permanente
      </div>

      <div class="logo">
        <a href="<?php echo url() ?>">
          <img src="<?php echo url('assets/img/logo-201802201229.svg') ?>" alt="<?php echo $site->title()->html() ?>" />
        </a>
      </div>

    </header>

    <?php snippet('search'); ?>

  </div>
