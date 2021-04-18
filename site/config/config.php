<?php

use Kirby\Toolkit\F;

// Server push headers (filename are fingerprinted during deployment)
if (
  isset($_SERVER["REQUEST_URI"]) &&
  strpos($_SERVER["REQUEST_URI"], "/panel") !== 0
) {
  header(
    "Link: </assets/css/app.css>; rel=preload; as=style, </assets/js/app.js>; rel=preload; as=script"
  );
}

$config = [
  // Switch date handler for translated months and days
  "date" => [
    "handler" => "strftime",
  ],
  "timezone" => "Europe/Paris",
  "locale" => "fr_FR",
  "cache" => [
    "pages" => [
      "active" => true,
    ],
  ],
  "mlbrgl.kirby-algolia" => [
    "fields" => [
      "article" => [
        "meta" => ["title", "datetime", "author"],
        "boost" => ["teaser"],
        "main" => ["text"],
      ],
      "news" => [
        "meta" => ["title", "datetime", "author"],
        "boost" => ["teaser"],
        "main" => ["text"],
      ],
      "quiz" => [
        "meta" => ["title", "datetime", "author"],
        "boost" => ["teaser"],
        "main" => ["text"],
      ],
    ],
  ],
];

// Include a local config file if it exists
$local_config = F::load(__DIR__ . "/local.config.php", []);

return array_replace_recursive($config, $local_config);
