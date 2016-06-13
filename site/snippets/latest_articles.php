<?php
$latest_articles = page('articles')->children()->flip()->limit(2);
$last = $latest_articles->last();
?>

<?php foreach($latest_articles as $article): ?>
  <article<?php ecco($article == $last,' class="last"') ?>>
    <h1>
      <a href="<?php echo $article->url() ?>">
        <?php echo html($article->title()) ?>
      </a>
    </h1>
    <div class="meta">
      <div class="author"><?php echo html($article->author()) ?></div>
      <div class="date"><time datetime="<?php echo $article->datetime() ?>"> <?php echo html($article->date('%d %B %Y','datetime')) ?> </time></div>
    </div>
    <div class="teaser">
      <p><?php echo html($article->teaser()->excerpt(300)) ?></p>
    </div>
  </article>
<?php endforeach ?>