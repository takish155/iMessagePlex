<section class="mb-10">
  <h2 class="text-xl font-semibold mb-4">Recent Messages</h2>
  <table class="table">
    <thead>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $index = 1;
      foreach ($messages as $message):  ?>
        <tr>
          <th><?= $index ?></th>
          <td><?= $message->name ?></td>
          <td><?= $message->email ?></td>
          <td><?= $message->message ?></td>
        </tr>
      <?php
        $index++;
      endforeach ?>
    </tbody>
  </table>
</section>