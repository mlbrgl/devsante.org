<?php $articles = $page->children()->listed()->flip()->paginate(10) ?>

<?php foreach($articles as $article): ?>
  <article>
    <div class="title-date">
      <h1><a href="<?= $article->url() ?>"><?php echo $article->title()->html(); ?></a></h1>
      <div class="date"><?php echo $article->datetime()->toDate('%d %B %Y') ?></div>
    </div>
    <div class="author"><?php echo $article->author()->html(); ?></div>
    <div class="text"><?php echo $article->text()->kt()->excerpt(300); ?></div>
  </article>
<? endforeach ?>

<?php if($articles->pagination()->hasPages()): ?>
<nav class="pagination">

  <?php if($articles->pagination()->hasPrevPage()): ?>
  <a class="prev" href="<?php echo $articles->pagination()->prevPageURL() ?>">
    <span class="i-arrow-left icon"></span>
    <span>Précédent<span>
  </a>
  <?php endif ?>

  <?php if($articles->pagination()->hasNextPage()): ?>
  <a class="next" href="<?php echo $articles->pagination()->nextPageURL() ?>">
    <span>Suivant<span>
    <span class="i-arrow-right icon"></span>
  </a>
  <?php endif ?>

</nav>
<?php endif ?>