<nav class="excerpts" role="navigation">
  <?php if($prev = $page->nextVisible()) : ?>
    <div class="excerpt previous">
      <div class="subhead"><a href="<?php echo $prev->url(); ?>"><span class="icon i-arrow-left"></span><?php echo $label_previous ?></span></a></div>
      <?php snippet('excerpt-news', array('excerpt' => $prev)); ?>
    </div>
  <?php endif; ?>
  <?php if($next = $page->prevVisible()) : ?>
    <div class="excerpt next">
      <div class="subhead"><a href="<?php echo $next->url(); ?>"><?php echo $label_next ?></a><span class="icon i-arrow-right"></span></a></div>
      <?php snippet('excerpt-news', array('excerpt' => $next)); ?>
    </div>
  <?php endif; ?>
</nav>
