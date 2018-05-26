<?php
  $latest_articles = page('articles')->children()->visible()->flip()->limit(10);
  $latest_article = $latest_articles->first();
  $latest_articles_without_last = $latest_articles->not($latest_article);

  $latest_news = page('actualites')->children()->visible()->flip()->limit(10);
  $latest_news_article = $latest_news->first();
  $latest_news_without_last = $latest_news->not($latest_news_article);

  $latest_content = (new Pages(array($latest_article, $latest_news_article)))->sortBy('datetime', 'desc');
  $latest_content_without_last = (new Pages(array($latest_articles_without_last, $latest_news_without_last)))->sortBy('datetime', 'desc')->limit(8);

  $latest_content = $latest_content->merge($latest_content_without_last);
?>

<div class="gutter-sizer"></div>
<?php foreach($latest_content as $content): ?>
  <div class="excerpt">
    <?php if($content->intendedTemplate() === 'news'): ?>
      <div class="subhead">Actualité</div>
      <?php snippet('excerpt-news', array('excerpturi' => $content->uri())); ?>
    <?php elseif($content->intendedTemplate() === 'article'): ?>
      <div class="subhead">Article</div>
      <?php snippet('excerpt-article', array('excerpturi' => $content->uri())); ?>
    <?php endif; ?>
  </div>
<?php endforeach ?>
