<?php snippet('top') ?>

  <main class="not-home">

    <div class="content">

      <h1 class="page-title"><?php echo $page->title()->html() ?></h1>

      <div class="meta">
        <div class="date"><time datetime="<?php echo $page->datetime() ?>"><?php echo $page->date('%d %B %Y','datetime') ?></time></div>
      </div>

      <div class="text">
        <?php echo $page->text()->kirbytext() ?>
      </div>

      <?php snippet('prev-next', array('label_previous' => 'Quiz précédent', 'label_next' => 'Quiz suivant')); ?>

    </div>

  </main>

<?php snippet('bottom') ?>
