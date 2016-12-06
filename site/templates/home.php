<?php snippet('top', array('context' => 'home')) ?>

<main class="home" role="main">

  <div class="content">
  
    <section class="derniers-articles theme">
      <h1 class="section-title"><span class="icon i-quill"></span>Dernier article sur <strong>la drépanocytose</strong></h1>
      <div class="inner">
        <?php snippet('home-latest-articles', array('mode'=>'theme')); ?>
      </div>
    </section>

    
    <section class="derniers-articles standard">
      <h1 class="section-title"><span class="icon i-quill"></span>Derniers articles</h1>
      <?php snippet('home-latest-articles', array('mode'=>'standard')); ?>
    </section>


    <?php /* 
    <section id="message" class="annexes">
      <h1 class="section-title"><span class="i-bullhorn"></span>Message</h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pellentesque commodo lorem consequat ullamcorper. Pellentesque nec placerat turpis.    Vivamus laoreet maximus nulla. Aenean pretium libero vel elit sodales, eget dapibus orci vulputate.
    </section> 


    <section id="numeros-speciaux" class="annexes">
      <h1 class="section-title"><span class="i-files-empty"></span>Numéros spéciaux</h1>
      Suspendisse. Donec sagittis malesuada quam et lobortis. Pellentesque id ornare sem. Phasellus consectetur dui ligula, quis lobortis nisi place
    </section> 
    */ ?>

    <section id="actualites" class="excerpt">
      <h1 class="section-title"><span class="icon i-newspaper"></span>Actualités</h1>
      <?php snippet('excerpt', array('excerpturi' => page('actualites')->children()->visible()->last()->uri())); ?>
    </section>


    <section id="a-lire" class="excerpt">
      <h1 class="section-title"><span class="icon i-bookmark"></span>A lire</h1>
      <?php snippet('excerpt', array('excerpturi' => $page->annexuri())); ?>
    </section>
    
    <?php /*
    <section id="communication-ponctuelle">
      <div class="text">
        <div class="title">Emplacement ponctuel pour communiquer</div>
        <div>Cras tincidunt purus fringilla mauris vehicula tempor.</div>
      </div>
      <div class="plus">
        <a href="/"><span>></span></a>
      </div>
    </section>
    */?>
  
  </div>

</main>

<?php snippet('bottom') ?>