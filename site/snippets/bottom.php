  <footer>
    <div class="container wide">

      <div id="footer-top">
        <ul>
          <li><a href="/l-association/faire-un-don">FAIRE UN DON</a></li>
          <li><a href="/l-association/mentions-legales">MENTION LÉGALES</a></li>
          <li><a href="mailto:contact@devsante.org"><span class="i-envelop"></span><span class="contact">CONTACT</span></a></li>
          <li class="last"><a href="https://www.facebook.com/devsante.org" target="_blank" class="i-facebook2"></a></li>
        </ul>
      </div>

      <div id="footer-bottom">

        <div id="honcode">
          <p><a href="https://www.healthonnet.org/HONcode/Conduct_f.html?HONConduct228684" onclick="window.open(this.href); return false;" > <img src="https://www.honcode.ch/HONcode/Seal/French/HONConduct228684_s2.gif" style="border:0px; width: 69px; height: 31px; float: left; margin: 2px;" title="Ce site respecte les principes de la charte HONcode de HON" alt="Ce site respecte les principes de la charte HONcode de HON" /></a> Ce site respecte les <a href="http://www.healthonnet.org/HONcode/Conduct_f.html" onclick="window.open(this.href); return false;"> principes de la charte HONcode</a>. <br /><a href="https://www.healthonnet.org/HONcode/Conduct_f.html?HONConduct228684" onclick="window.open(this.href); return false;">V&eacute;rifiez ici.</a> </p>
        </div>

        <div id="copyright">
          <?php echo "&copy; {$site->title()->html()} " . date("Y") ?>
        </div>

      </div>
    </div>

    <div class="back-to-top"><a href="#"><span class="icon i-back-to-top"></span></a></div>

    <div id="notifications">
      <?php /* pattern("survey") */ ?>
      <?php pattern("cookie-bar") ?>
    </div>

  </footer>


  <script type="text/javascript">
    <?php
      echo 'algolia_appId = "' . c::get('kirby-algolia')['algolia']['application_id'] . '"' . PHP_EOL;
      echo 'algolia_apiKey = "' . c::get('kirby-algolia')['algolia']['api_key_search_only'] . '"' . PHP_EOL;
      echo 'algolia_indexName = "' . c::get('kirby-algolia')['algolia']['index'] . '"' . PHP_EOL;
    ?>
  </script>

  <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.0.0/dist/algoliasearch-lite.umd.js" integrity="sha256-MfeKq2Aw9VAkaE9Caes2NOxQf6vUa8Av0JqcUXUGkd0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.0.0/dist/instantsearch.production.min.js" integrity="sha256-6S7q0JJs/Kx4kb/fv0oMjS855QTz5Rc2hh9AkIUjUsk=" crossorigin="anonymous"></script>

  <?php
    echo js('//cdn.jsdelivr.net/npm/webfontloader@1.6.28/webfontloader.min.js');
    echo js('assets/js/app.js');
  ?>

</body>
</html>
