<!DOCTYPE html>
<html lang="fr">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicons/apple-touch-icon.png?v=694NrnM4Ex">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicons/favicon-32x32.png?v=694NrnM4Ex">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicons/favicon-16x16.png?v=694NrnM4Ex">
  <link rel="manifest" href="/assets/favicons/site.webmanifest?v=694NrnM4Ex">
  <link rel="mask-icon" href="/assets/favicons/safari-pinned-tab.svg?v=694NrnM4Ex" color="#365086">
  <link rel="shortcut icon" href="/assets/favicons/favicon.ico?v=694NrnM4Ex">
  <meta name="apple-mobile-web-app-title" content="Devsante">
  <meta name="application-name" content="Devsante">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="msapplication-config" content="/assets/favicons/browserconfig.xml?v=694NrnM4Ex">
  <meta name="theme-color" content="#365086">

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
