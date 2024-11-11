<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? "" ?></title>
  <link href="/css/style.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
  <style>
    /* Make the code block's background transparent */
    * {
      scroll-behavior: smooth;
    }

    pre[class*="language-"],
    code[class*="language-"] {
      background: transparent !important;
      /* Makes the background transparent */
      box-shadow: none;
      /* Remove shadow if the theme has one */
    }

    /* Optional: Add padding for readability */
    pre[class*="language-"] {
      padding: 1em;
      /* Add padding if needed */
    }
  </style>

</head>