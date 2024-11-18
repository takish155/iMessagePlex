<!DOCTYPE html>
<html lang="<?= $locale ?>">

<?= loadPartials("html-head", ["title" => "Docs - iMessagePlex"]) ?>

<body data-theme="night">
  <!-- Header -->
  <?= loadPartials("header") ?>

  <main class="w-[95%] mx-auto max-w-[1000px]">
    <!-- Getting Started Section -->
    <section class="my-5">
      <h2 class="text-2xl font-bold mb-2"><?= $t["gettingStartedTitle"] ?></h2>
      <p class="max-w-[700px]"><?= $t["gettingStartedDescription"] ?></p>
    </section>

    <div class="divider w-full my-10"></div>

    <!-- Setup a Form Section -->
    <section class="my-5">
      <h2 class="text-2xl font-bold mb-2">
        <span class="font-normal text-lg">1.</span> <?= $t["setupFormTitle"] ?>
      </h2>
      <p class="max-w-[700px] mb-2"><?= $t["setupFormDescription"] ?></p>
      <?= loadPartials("docs/contact-form"); ?>
    </section>

    <div class="divider w-full my-10"></div>

    <!-- Handle Form Section -->
    <section class="my-5">
      <h2 class="text-2xl font-bold mb-2">
        <span class="font-normal text-lg">2.</span> <?= $t["handleFormTitle"] ?>
      </h2>
      <p class="max-w-[700px] mb-2"><?= $t["handleFormDescription"] ?></p>

      <!-- Required Body JSON Section -->
      <div class="mb-8">
        <h3 class="text-lg font-bold mb-2"><?= $t["requiredBodyJsonTitle"] ?></h3>
        <div class="mockup-code max-w-[700px] mb-2">
          <p class="ml-4 mb-4"><span class="text-primary"><?= $t["requiredBodyJsonEndpoint"] ?></span></p>
          <?php foreach ($t["requiredBodyJsonFields"] as $field): ?>
            <pre data-prefix=">"><code><?= $field ?></code></pre>
          <?php endforeach; ?>
        </div>
        <p class="max-w-[700px] mb-2"><?= $t["apiKeyNote"] ?></p>
      </div>

      <!-- Responses Section -->
      <div class="mb-8">
        <h3 class="text-lg font-bold mb-2"><?= $t["responsesTitle"] ?></h3>
        <div class="mockup-code max-w-[700px]">
          <?php foreach ($t["responses"] as $response): ?>
            <pre data-prefix=">"><code><?= $response ?></code></pre>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Example Section -->
      <div class="mb-8">
        <h3 class="text-lg font-bold mb-2"><?= $t["exampleTitle"] ?></h3>
        <?= loadPartials("docs/handle-form"); ?>
      </div>

    </section>
  </main>
  <?= loadPartials("footer"); ?>
</body>

</html>