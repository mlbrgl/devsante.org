<?php snippet('header') ?>

  <main class="main" role="main">

    <h1><?php echo $page->title()->html() ?></h1>

    <? snippet('liste_articles') ?>

  </main>

<? snippet('sidebar_menu') ?>
<? snippet('footer') ?>