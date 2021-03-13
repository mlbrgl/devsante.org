<?php snippet('top/top') ?>

  <main class="not-home">

    <div class="content">

      <h1 class="page-title"><?php echo $page->title()->html() ?></h1>

      <div class="meta">
        <div class="author"><?php echo $page->author() ?></div>
        <div class="date"><time datetime="<?php echo $page->datetime() ?>"><?php echo $page->date('%d %B %Y','datetime') ?></time></div>
      </div>

      <div class="teaser">
        <?php echo $page->teaser()->kirbytext() ?>
      </div>

      <div class="text">
        <?php echo $page->text()->kirbytext() ?>
      </div>

      <?php snippet('prev-next', array('label_previous' => 'Article précédent', 'label_next' => 'Article suivant')); ?>

    </div>

  </main>

<?php snippet('bottom/bottom') ?>
