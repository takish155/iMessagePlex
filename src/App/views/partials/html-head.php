<?php


$t = getMessage("home-page");
$locale = getLocale();

?>

<link rel="alternate" hreflang="en" href="https://imessageplex.com/en/">
<link rel="alternate" hreflang="jp" href="https://imessageplex.com/ja/">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/css/style.css" rel="stylesheet">
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
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

  <!-- Title -->
  <title><?= $title ?? "iMessagePlex" ?></title>
  <!-- Description -->
  <meta name="description" content="<?= $description ?? $t['description'] ?>" />
  <!-- Tags (Keywords) -->
  <meta name="keywords" content="<?= $t["tags"] ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= $title ?? "iMessagePlex" ?>">
  <meta property="og:description" content="<?= $description ?? $t['description'] ?>">
  <meta property="og:url" content="https://takish155.com/<?= $locale ?>/">
  <meta property="og:type" content="website">

  <!-- Twitter -->
  <meta name="twitter:description" content="<?= $description ?? $t['description'] ?>">
  <meta name="twitter:card" content="summary_large_image">


  <!-- About the author (me) -->
  <meta name="author" content="Lim Takeshi - https://takish155.com/<?= $locale ?>/">
  <meta property="og:author" content="Lim Takeshi">

  <link rel="canonical" href="https://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">

</head>