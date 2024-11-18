<?php

use App\Controllers\LocaleController;

$locale = getLocale();

?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? "iMessagePlex" ?></title>
  <link href="/css/style.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
  <style>
    * {
      scroll-behavior: smooth;
    }

    pre[class*="language-"],
    code[class*="language-"] {
      background: transparent !important;
      box-shadow: none;
    }

    pre[class*="language-"] {
      padding: 1em;
    }
  </style>
</head>