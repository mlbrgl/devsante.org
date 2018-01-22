<div id="menu-overlay" class="overlay"></div>

<nav id="menu">
  <ul>
    <li>
      <a href="/"<?= $page->isHomePage() ? ' class="active"' : '' ?>>
        <span class="icon-no-margin i-home3"></span>
        <span class="text">ACCUEIL</span>
      </a>
    </li>
    <li>
      <a href="/l-association"<?= $page->uid() === 'l-association' ? ' class="active"' : '' ?>>
        ASSOCIATION
      </a>
    </li>
    <li>
      <a href="/actualites"<?= $page->uid() === 'actualites' ? ' class="active"' : '' ?>>
        ACTUALITES
      </a>
    </li>
    <li>
      <a href="/articles"<?= $page->uid() === 'articles' ? ' class="active"' : '' ?>>
        ARTICLES
      </a>
    </li>
    <li class="last">
      <a href="/?q=drépano" class="main-theme">
        ARTICLES DRÉPANOCYTOSE
      </a>
    </li>
  </ul>
    <?php /* <a href="#" class="i-facebook icon"></a> */ ?>
</nav>
