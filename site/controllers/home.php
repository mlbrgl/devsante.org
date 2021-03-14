<?php

function getLatest($parent_page) {
  $latest_pages = $parent_page->children()->listed()->flip()->limit(10);
  $latest_page = $latest_pages->first();
  $next_pages = $latest_pages->not($latest_page);
  return [$latest_page, $next_pages];
}

return function () {
  list($latest_article, $next_articles) = getLatest(page('articles'));
  list($latest_news, $next_news) = getLatest(page('actualites'));
  list($latest_quiz, $next_quizzes) = getLatest(page('quiz'));
  
  $latest_content = (new Pages(array($latest_article, $latest_news, $latest_quiz)))->sortBy('datetime', 'desc');
  $next_content = (new Pages(array($next_articles, $next_news, $next_quizzes)))->sortBy('datetime', 'desc')->limit(7);
  
  return [
    'latest_content' => $latest_content->merge($next_content)
  ];
};