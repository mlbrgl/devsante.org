<?php
if(isset($excerpt)):
  $excerpt_text = $excerpt->teaser()->isNotEmpty() ? $excerpt->teaser() : $excerpt->text();
  $type = $excerpt->intendedTemplate()->name();
  $subhead = $type === "article" ? "Article" : ($type === "news" ? "Actualité" : "Quiz")
?>

  <article>
    <?php if(!isset($hide_subhead) || !$hide_subhead): ?>
      <div class="subhead"><?php echo $subhead ?></div>
    <?php endif; ?>
    
    <h1>
      <a href="<?php echo $excerpt->url() ?>">
        <?php echo html($excerpt->title()) ?>
      </a>
    </h1>

    <div class="meta">
      <?php if($excerpt->author()->isNotEmpty()) : ?>
        <div class="author"><?php echo html($excerpt->author()) ?></div>
      <?php endif; ?>
      <div class="date"><time datetime="<?php echo $excerpt->datetime() ?>"> <?php echo html($excerpt->datetime()->toDate('%d %B %Y')) ?> </time></div>
    </div>

    <div class="teaser">
      <p><?php echo $excerpt_text->excerpt(300) ?></p>
    </div>

  </article>

<?php endif; ?>
