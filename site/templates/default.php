<?php snippet('top/top') ?>

  <main class="not-home">

    <div class="content">

      <h1 class="page-title"><?php echo $page->title()->html() ?></h1>
    
      <?php echo $page->text()->kirbytext() ?>
    
    </div>

  </main>

<?php snippet('bottom/bottom') ?>