<?php $descendants = $page->children() ?>

<?php foreach($descendants->sortBy('datetime', 'desc') as $article): ?>
<div class="list">
  <article>
    <h1><a href="<?= $article->url() ?>"><?php echo $article->title()->html(); ?></a></h1>
    <div class="date"><?php echo $article->date('%d %B %Y', 'datetime') ?></div>
    <div class="author"><?php echo $article->author()->html(); ?></div>
    <div class="text"><?php echo $article->text()->kt()->excerpt(140); ?></div>
  </article>
</div>
<? endforeach ?>