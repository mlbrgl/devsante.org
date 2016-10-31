<?php
// TODO check visible / invisible
$annex = page($annexuri);
?>

<article>
  <h1>
    <a href="<?php echo $annex->url() ?>">
      <?php echo html($annex->title()) ?>
    </a>
  </h1>
  
  <div class="meta">
    <?php if(!empty($annex->author())) : ?>
      <div class="auteur"><?php echo html($annex->author()) ?></div>
    <?php endif; ?>
  </div>

  <div class="teaser">
    <p><?php echo html($annex->text()->excerpt(300)) ?></p>
  </div>

  <div class="date"><time datetime="<?php echo $annex->datetime() ?>"> <?php echo html($annex->date('%B %Y','datetime')) ?> </time></div>

</article>