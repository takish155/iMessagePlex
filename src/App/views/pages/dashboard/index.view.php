<!DOCTYPE html>
<html lang="en">

<?= loadPartials("html-head", [
  "title" => $t["title"] . " - iMessagePlex",
]) ?>

<body>
  <!-- Header -->
  <?= loadPartials("header") ?>

  <?= loadPartials("load-server-message") ?>

  <div class="flex justify-evenly mt-4">
    <!-- Side Nav -->
    <!-- <?= loadPartials("user-menu", [
            "active" => "dashboard"
          ]) ?> -->

    <main class="w-[95%] min-h-screen max-w-[1000px] mx-auto">
      <?= loadPartials("dashboard/hero-section", [
        "totalMessageCount" => $messageCount ?? 0,
        "totalTodayMessageCount" => $messageTodayCount ?? 0,
        "locale" => $locale,
        "t" => $t,
      ]); ?>

      <?= loadPartials("dashboard/message-table", [
        "messages" => $messages ?? [],
        "t" => $t,
        "locale" => $locale,
      ]); ?>
    </main>
  </div>

  <?= loadPartials("footer"); ?>
</body>

</html>