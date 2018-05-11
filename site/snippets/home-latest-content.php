<?php
  $latest_articles = page('articles')->children()->visible()->flip()->limit(10);
  $latest_news = page('actualites')->children()->visible()->flip()->limit(10);
  $latest_content = new Pages(array($latest_articles, $latest_news));
  $latest_content = $latest_content->sortBy('datetime', 'desc')->limit(10);
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
