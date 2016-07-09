  <footer class="container wide">

    <div id="footer-top">
      <ul>
        <li><a href="#">Link 1</a></li>
        <li><a href="#">Link 1</a></li>
        <li><a href="#">Link 1</a></li>
        <li class="last"><a href="#">Link 1</a></li>
      </ul>
    </div>

    <div id="footer-bottom">
      <div class="copyright">
        <?php echo $site->copyright()->kirbytext() ?>
      </div>

      <div class="footer-to-top"><a href="#">Haut <span class="i-quill icon"></span></a></div>
    </div>
  </footer>

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