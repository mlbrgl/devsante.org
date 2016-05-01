<?php snippet('header') ?>

<main class="home" role="main">

  <div style="text-align:center; margin-bottom: 2rem; background-color: #FFFDBF; ;font-weight: bold; padding: 1rem;">
    <a href="/articles">Consulter les articles</a>
  </div>
  

    <div class="derniers-articles theme">
      <h1><span class="i-bubble"></span>Les derniers articles sur <strong>la drépanocytose</strong></h1>
      <div class="inner">
        <?php snippet('latest_articles'); ?>
      </div>
    </div>

    
    <div class="derniers-articles standard">
      <h1><span class="icon i-bubble"></span>Derniers articles</h1>
      <?php snippet('latest_articles'); ?>
    </div>


    <div id="message" class="annexes">
      <h1><span class="i-bullhorn"></span>Message</h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pellentesque commodo lorem consequat ullamcorper. Pellentesque nec placerat turpis.    Vivamus laoreet maximus nulla. Aenean pretium libero vel elit sodales, eget dapibus orci vulputate.
    </div> 


    <div id="numeros-speciaux" class="annexes">
      <h1><span class="i-files-empty"></span>Numéros spéciaux</h1>
      Suspendisse. Donec sagittis malesuada quam et lobortis. Pellentesque id ornare sem. Phasellus consectetur dui ligula, quis lobortis nisi place
    </div>

    <div id="actualites" class="annexes">
      <h1><span class="i-newspaper"></span>Actualités</h1>
      Donec sagittis malesuada quam et lobortis. Pellentesque id ornare sem. Phasellus consectetur dui ligula, quis lobortis nisi placerat sed. Nulla tincidunt blandit arcu porttitor feugiat.
      Donec sagittis malesuada quam et lobortis. Pellentesque id ornare sem. Phasellus consectetur dui ligula, quis lobortis nisi placerat sed. Nulla tincidunt blandit arcu porttitor feugiat.
      Donec sagittis malesuada quam et lobortis. Pellentesque id ornare sem. Phasellus consectetur dui ligula, quis lobortis nisi placerat sed. Nulla tincidunt blandit arcu porttitor feugiat.
    </div>


    <div id="a-lire" class="annexes">
      <h1><span class="i-bookmark"></span>A lire</h1>
      Cras tincidunt purus fringilla mauris vehicula tempor. Vestibulum varius dignissim ligula, et iaculis urna rutrum molestie. Etiam et mollis mauris. tum eu dui nec, lobortis maximus ligula.
    </div>
    

  <div id="communication-ponctuelle">
    <div class="text">
      <div class="title">Emplacement ponctuel pour communiquer</div>
      <div>Cras tincidunt purus fringilla mauris vehicula tempor.</div>
    </div>
    <div class="plus">
      <a href="/"><span>></span></a>
    </div>
  </div>
  

</main>

<?php snippet('footer') ?>