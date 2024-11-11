<section class="mb-10">
  <h2 class="text-xl font-semibold mb-4">Your Messages</h2>

  <?php
  foreach ($messages as $message):  ?>
    <div class="chat chat-start mb-4">
      <div class="chat-header">
        <?= $message->name ?> (<?= $message->email ?>)
      </div>
      <div class="chat-bubble"><?= $message->message  ?></div>
    </div>
  <?php
  endforeach ?>
</section>