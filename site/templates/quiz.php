<?php snippet('top/top') ?>

  <main class="not-home">

    <div class="content">

      <h1 class="page-title"><?php echo $page->title()->html() ?></h1>

      <div class="meta">
        <?php if($page->author()->isNotEmpty()): ?>
          <div class="author"><?php echo $page->author() ?></div>
        <?php endif; ?>
        <div class="date"><time datetime="<?php echo $page->datetime() ?>"><?php echo $page->datetime()->toDate('%d %B %Y') ?></time></div>
      </div>

      <?php if($page->teaser()->isNotEmpty()): ?>
        <div class="teaser">
          <?php echo $page->teaser()->kirbytext() ?>
        </div>
      <?php endif; ?>

      <div class="text">
        <?php echo $page->text()->kirbytext() ?>
      </div>

      <?php snippet('prev-next', array('label_previous' => 'Quiz précédent', 'label_next' => 'Quiz suivant')); ?>

    </div>

  </main>

<?php snippet('bottom/bottom') ?>
