<?php
// TODO check visible / invisible
if(isset($excerpt) || isset($excerpturi) && $excerpt = page($excerpturi)):
?>

  <article class="news">
    <a href="<?php echo $excerpt->url() ?>">
      <h1><?php echo html($excerpt->title()) ?></h1>

      <div class="meta">
        <?php if(!empty($excerpt->author())) : ?>
          <div class="auteur"><?php echo html($excerpt->author()) ?></div>
        <?php endif; ?>
      </div>

      <div class="teaser">
        <p><?php echo $excerpt->text()->excerpt(300) ?></p>
      </div>

    </a>

    <div class="date"><time datetime="<?php echo $excerpt->datetime() ?>"> <?php echo html($excerpt->date('%B %Y','datetime')) ?> </time></div>

  </article>

<?php endif; ?>
