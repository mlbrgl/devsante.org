<?php
// TODO check visible / invisible
if(isset($excerpt) || isset($excerpturi) && $excerpt = page($excerpturi)):
?>

  <article class="article">
    <a href="<?php echo $excerpt->url() ?>">
      <h1><?php echo html($excerpt->title()) ?></h1>

      <div class="meta">
        <div class="author"><?php echo html($excerpt->author()) ?></div>
        <div class="date"><time datetime="<?php echo $excerpt->datetime() ?>"> <?php echo html($excerpt->date('%d %B %Y','datetime')) ?> </time></div>
      </div>

      <div class="teaser">
        <p><?php echo html($excerpt->teaser()->excerpt(300)) ?></p>
      </div>

    </a>
  </article>

<?php endif; ?>
