<section class="mb-10">
  <h2 class="text-xl font-semibold mb-4"><?= $t["yourMessages"] ?></h2>

  <?php
  foreach ($messages as $message):  ?>
    <div class="chat chat-start mb-4">
      <div class="chat-header flex gap-2 flex-wrap">
        <?= $message->name ?> (<?= $message->email ?>) <form method="POST" action="/<?= $locale ?>/user/message/<?= $message->id ?>"><input type="hidden" name="_method" value="DELETE" /><button class="text-error"><?= $t["delete"] ?></button></form>
      </div>
      <div class="chat-bubble"><?= $message->message  ?></div>
    </div>
  <?php
  endforeach ?>
</section>