<!DOCTYPE html>
<html lang="en">

<?= loadPartials("html-head", [
  "title" => "$status Error - iMessagePlex",
]) ?>

<body>
  <!-- Header -->
  <?= loadPartials("header") ?>

  <main class="mt-[5rem]">
    <section>
      <h2 class="text-3xl font-bold text-center">
        <?= $status ?> Error
      </h2>
      <p class="text-center text-sm mb-4"><?= $message ?></p>
      </div>
    </section>
  </main>

</body>

</html>