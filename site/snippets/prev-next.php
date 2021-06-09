<nav class="excerpts" role="navigation">
  <?php if($prev = $page->nextListed()) : ?>
    <div class="excerpt previous">
      <div class="nav"><a href="<?php echo $prev->url(); ?>"><span class="icon i-arrow-left"></span><?php echo $label_previous ?></span></a></div>
      <?php snippet('excerpt/excerpt', array('excerpt' => $prev, 'hide_subhead' => true)); ?>
    </div>
  <?php endif; ?>
  <?php if($next = $page->prevListed()) : ?>
    <div class="excerpt next">
      <div class="nav"><a href="<?php echo $next->url(); ?>"><?php echo $label_next ?><span class="icon i-arrow-right"></span></a></div>
      <?php snippet('excerpt/excerpt', array('excerpt' => $next, 'hide_subhead' => true)); ?>
    </div>
  <?php endif; ?>
</nav>
