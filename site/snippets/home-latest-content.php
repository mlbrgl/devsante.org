<?php
  $latest_articles = page('articles')->children()->visible()->flip()->limit(10);
  $latest_article = $latest_articles->first();
  $latest_articles_without_last = $latest_articles->not($latest_article);

  $latest_news = page('actualites')->children()->visible()->flip()->limit(10);
  $latest_news_article = $latest_news->first();
  $latest_news_without_last = $latest_news->not($latest_news_article);

  $latest_quizzes = page('quiz')->children()->visible()->flip()->limit(10);
  $latest_quiz = $latest_quizzes->first();
  $latest_quizzes_without_last = $latest_quizzes->not($latest_quiz);

  $latest_content = (new Pages(array($latest_article, $latest_news_article, $latest_quiz)))->sortBy('datetime', 'desc');
  $latest_content_without_last = (new Pages(array($latest_articles_without_last, $latest_news_without_last, $latest_quizzes_without_last)))->sortBy('datetime', 'desc')->limit(7);

  $latest_content = $latest_content->merge($latest_content_without_last);
?>

<div class="gutter-sizer"></div>
<?php foreach($latest_content as $content): ?>
  <div class="excerpt">
    <?php snippet('excerpt', array('excerpt' => $content)); ?>
  </div>
<?php endforeach ?>
