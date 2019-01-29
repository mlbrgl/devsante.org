<?php
if(isset($excerpt)):
  $excerpt_text = $excerpt->teaser()->isNotEmpty() ? $excerpt->teaser() : $excerpt->text()
?>

  <article class="news">
    <a href="<?php echo $excerpt->url() ?>">
      <h1><?php echo html($excerpt->title()) ?></h1>

      <div class="meta">
        <?php if($excerpt->author()->isNotEmpty()) : ?>
          <div class="author"><?php echo html($excerpt->author()) ?></div>
        <?php endif; ?>
      </div>

      <div class="teaser">
        <p><?php echo $excerpt_text->excerpt(300) ?></p>
      </div>

    </a>

    <div class="date"><time datetime="<?php echo $excerpt->datetime() ?>"> <?php echo html($excerpt->date('%B %Y','datetime')) ?> </time></div>

  </article>

<?php endif; ?>
