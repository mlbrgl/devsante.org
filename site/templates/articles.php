<?php snippet('top') ?>

  <main class="liste-articles" role="main">
    
    <div class="content">
      
      <h1><?php echo $page->title()->html() ?></h1>

      <? snippet('liste_articles') ?>

    </div>
    
  </main>

<? snippet('sidebar_menu') ?>
<? snippet('bottom') ?>