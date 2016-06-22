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
    echo js('assets/js/react.js');
    echo js('assets/js/react-dom.js');
    echo js('assets/js/main.js');
    echo js('//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js');
  ?>

  <script>
  <?php 
    /* Loading React components */
    echo snippet('components');
  ?>
  </script>

</body>
</html>