<?php snippet('top/top') ?>
  <main class="not-home list">
    
    <div class="content">
      
      <h1 class="page-title"><?php echo $page->title()->html() ?></h1>

      <?php snippet('list/list') ?>

    </div>
    
  </main>

<?php snippet('bottom/bottom') ?>