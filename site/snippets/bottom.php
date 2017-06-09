  <footer>
    <div class="container wide">

      <div id="footer-top">
        <ul>
          <li><a href="/l-association/faire-un-don">FAIRE UN DON</a></li>
          <li><a href="/l-association/mentions-legales">MENTION LÉGALES</a></li>
          <li class="last"><a href="mailto:contact@devsante.org"><span class="i-envelop"></span><span class="contact">CONTACT</span></a></li>
        </ul>
      </div>

      <div id="footer-bottom">
        <div class="copyright">
          <?php echo $site->copyright()->kirbytext() ?>
        </div>

        <div class="footer-to-top"><a href="#">Haut <span class="icon i-arrow-up"></span></a></div>
      </div>
      
    </div>
  </footer>

  <script type="text/javascript">
    <?php
      echo 'algolia_appId = "' . c::get('kirby-algolia')['algolia']['application_id'] . '"' . PHP_EOL;
      echo 'algolia_apiKey = "' . c::get('kirby-algolia')['algolia']['api_key_search_only'] . '"' . PHP_EOL;
      echo 'algolia_indexName = "' . c::get('kirby-algolia')['algolia']['index'] . '"' . PHP_EOL;
    ?>
  </script>

  <?php
    echo js('//cdn.jsdelivr.net/instantsearch.js/1/instantsearch-preact.min.js');
    echo js('assets/js/app_746288c76c.js');
  ?>

  <script type="text/javascript">
    WebFontConfig = {
      google: { families: [ 'Lato:400,700,400italic:latin' ] }
    };
    (function() {
      var wf = document.createElement('script');
      wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
      wf.type = 'text/javascript';
      wf.async = 'true';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })(); 
  </script>
  
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-27231936-1', 'auto');
    ga('send', 'pageview');

  </script>

</body>
</html>