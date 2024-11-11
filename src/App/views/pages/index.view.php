<!DOCTYPE html>
<html lang="en">

<?= loadPartials("html-head", [
  "title" => "iMessagePlex",
]) ?>

<body data-theme="night">
  <!-- Header -->
  <?= loadPartials("header") ?>

  <?= loadPartials("index/hero-section") ?>

  <?= loadPartials("index/feature-section") ?>

  <?= loadPartials("index/intergrate-section") ?>

  <?= loadPartials("footer"); ?>


</body>

</html>