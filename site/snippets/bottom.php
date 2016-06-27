<?php /*
  <footer class="footer cf" role="contentinfo">

    <div class="copyright">
      <?php echo $site->copyright()->kirbytext() ?>
    </div>

    <div class="colophon">
      <a href="http://getkirby.com/made-with-kirby-and-love">Made with Kirby and <b>♥</b></a>
    </div>

  </footer>
*/ ?>

  <?php
    echo js('//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js');
    echo js('assets/js/classList.min.js');
    echo js('assets/js/main.js');
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

</body>
</html>