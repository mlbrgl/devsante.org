<?php

// Get the latest theme article
$lastest_articles_theme = latest_content_get_pages();

// Get the latest articles depending on the mode
switch ($mode) {
  case 'theme': $latest_articles = $lastest_articles_theme; break;
  case 'standard': $latest_articles = page('articles')->children()->not($lastest_articles_theme)->visible()->flip()->limit(2); break;
  default: break;
}

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