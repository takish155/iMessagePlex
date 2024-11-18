<?php

?>

<section class="flex justify-evenly mb-10 flex-wrap gap-4">
  <div class="card bg-base-200 shadow-lg w-[30%] max-sm:w-[90%] ">
    <div class="card-body">
      <h2><?= $t["totalMessages"] ?></h2>
      <p class="card-title">
        <?= $totalMessageCount ?? 0 ?>
      </p>
    </div>
  </div>
  <div class="card bg-base-200 shadow-lg w-[30%] max-sm:w-[90%]">
    <div class="card-body">
      <h2><?= $t["apiKey"] ?></h2>
      <p class="card-title">
      <p class="text-xs mb-1"><?= $t["apiKeyDescription"] ?></p>
      <form action="/<?= $locale ?>/user/generate-api-key" method="POST">
        <button class="btn btn-secondary btn-xs"><?= $t["generate"] ?></button>
      </form>
    </div>
  </div>
  <div class="card bg-base-200 shadow-lg w-[30%] max-sm:w-[90%]">
    <div class="card-body">
      <h2><?= $t["messagesToday"] ?></h2>
      <p class="card-title">
        <?= $totalTodayMessageCount ?? 0 ?>
      </p>
    </div>
  </div>
</section>