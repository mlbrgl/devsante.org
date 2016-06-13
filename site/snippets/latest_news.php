<?php
// TODO check visible / invisible
$latest_news = page('actualites')->children()->last();
?>

<article class="news">
  <h1>
    <a href="<?php echo $latest_news->url() ?>">
      <?php echo html($latest_news->title()) ?>
    </a>
  </h2>
  
  <div class="meta">
    <?php if(!empty($latest_news->author())) : ?>
      <div class="auteur"><?php echo html($latest_news->author()) ?></div>
    <?php endif; ?>
  </div>

  <div class="teaser">
    <p><?php echo html($latest_news->text()->excerpt(300)) ?></p>
  </div>

  <div class="date"><time datetime="<?php echo $latest_news->datetime() ?>"> <?php echo html($latest_news->date('%B %Y','datetime')) ?> </time></div>

</div>
