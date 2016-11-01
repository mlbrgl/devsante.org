<?php snippet('top') ?>

  <main class="not-home" role="main">

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

      <nav class="excerpts" role="navigation">
        
        <?php if($prev = $page->prevVisible()): ?>
          <section class="excerpt previous">
            <h1 class="section-title"><a href="<?php echo $prev->url(); ?>"><span class="icon i-arrow-left"></span>Article précédent</a></h1>
            <?php snippet('excerpt', array('excerpt' => $prev)); ?>
          </section>
        <?php endif ?>
        <?php if($next = $page->nextVisible()): ?>
          <div class="excerpt next">
            <h1 class="section-title"><a href="<?php echo $next->url(); ?>">Article suivant<span class="icon i-arrow-right"></span></a></h1>
            <?php snippet('excerpt', array('excerpt' => $next)); ?>
          </div>
        <?php endif ?>
      </nav>

    </div>
    
  </main>
  
<?php snippet('bottom') ?>