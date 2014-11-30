<? // for displaying all articles on the base-documentaire page
//$descendants = r($page->uri() == 'base-documentaire', $page->grandChildren(), $page->children())
?>

<? $descendants = $page->children() ?>

<? foreach($descendants->sortBy('date', 'desc') as $article): ?>
  <div class="article">
    <h3> <a href="<?= $article->url() ?>"><?= $article->title()->html() ?></a></h3>
    <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('j/m/Y', 'date') ?></time>
    <p class="teaser"> <?= $article->text()->kt()->excerpt(140) ?> </p>
  </div>
<? endforeach ?>