<?php snippet('top') ?>

  <main class="not-home">

    <div class="content">

      <h1 class="page-title"><?php echo $page->title()->html() ?></h1>

      <div class="text">
        <?php echo $page->text()->kirbytext() ?>
      </div>

      <?php snippet('prev-next', array('label_previous' => 'Actualité précédente', 'label_next' => 'Actualité suivante')); ?>

    </div>

  </main>

<?php snippet('bottom') ?>
