<?php snippet('header') ?>

  <main class="article" role="main">

    <div class="content">

      <h1><?php echo $page->title()->html() ?></h1>

      <div class="meta">
        <div class="auteur"><?php echo $page->author() ?></div>
        <div class="date"><time datetime="<?php echo $page->datetime() ?>"><?php echo $page->date('%d %B %Y','datetime') ?></time></div>
      </div>

      <div class="teaser">
        <?php echo $page->teaser()->kirbytext() ?>  
      </div>

      <div class="text">
        <?php echo $page->text()->kirbytext() ?>
      </div>
      
      <div class="related-articles">
        <div>article 1</div>
        <div>article 2</div>
      </div>

      <nav class="nextprev cf" role="navigation">
        <?php if($prev = $page->prevVisible()): ?>
        <a class="prev" href="<?php echo $prev->url() ?>">&larr; previous</a>
        <?php endif ?>
        <?php if($next = $page->nextVisible()): ?>
        <a class="next" href="<?php echo $next->url() ?>">next &rarr;</a>
        <?php endif ?>
      </nav>

    </div>
    
  </main>
  
<?php snippet('footer') ?>