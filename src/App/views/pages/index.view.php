<!DOCTYPE html>
<html lang="<?= $locale ?>">

<?= loadPartials("html-head", [
  "title" => "iMessagePlex",
]) ?>


<body data-theme="night">
  <!-- Header -->
  <?= loadPartials("header") ?>

  <?= loadPartials("index/hero-section", [
    "t" => $t["heroSection"]
  ]) ?>

  <?= loadPartials("index/feature-section", [
    "t" => $t["featureSection"]
  ]) ?>

  <?= loadPartials("index/intergrate-section", [
    "t" => $t["intergration"]
  ]) ?>

  <?= loadPartials("footer"); ?>


</body>

</html>