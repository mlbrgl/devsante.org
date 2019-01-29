<?php
if(isset($excerpt)):
  $excerpt_text = $excerpt->teaser()->isNotEmpty() ? $excerpt->teaser() : $excerpt->text()
?>

  <article class="quiz">
    <a href="<?php echo $excerpt->url() ?>">
      <h1><?php echo html($excerpt->title()) ?></h1>

      <div class="meta">
        <?php if($excerpt->author()->isNotEmpty()) : ?>
          <div class="author"><?php echo html($excerpt->author()) ?></div>
        <?php endif; ?>
        <div class="date"><time datetime="<?php echo $excerpt->datetime() ?>"> <?php echo html($excerpt->date('%d %B %Y','datetime')) ?> </time></div>
      </div>

      <div class="teaser">
        <p><?php echo $excerpt_text->excerpt(300) ?></p>
      </div>

    </a>

  </article>

<?php endif; ?>
