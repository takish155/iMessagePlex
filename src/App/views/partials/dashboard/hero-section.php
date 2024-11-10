<section class="flex justify-evenly mb-10 flex-wrap gap-4">
  <div class="card bg-base-200 shadow-lg w-[30%] max-sm:w-[90%] ">
    <div class="card-body">
      <h2>Total Messages</h2>
      <p class="card-title">
        <?= $totalMessageCount ?? 0 ?>
      </p>
    </div>
  </div>
  <div class="card bg-base-200 shadow-lg w-[30%] max-sm:w-[90%]">
    <div class="card-body">
      <h2>API Key</h2>
      <p class="card-title">
      <p class="text-xs mb-1">If you have forgotten or have none, generate one and make sure to remember it.</p>
      <form action="/user/generate-api-key" method="POST">
        <button class="btn btn-secondary btn-xs">Generate</button>
      </form>
    </div>
  </div>
  <div class="card bg-base-200 shadow-lg w-[30%] max-sm:w-[90%]">
    <div class="card-body">
      <h2>Messages Today</h2>
      <p class="card-title">
        <?= $totalTodayMessageCount ?? 0 ?>
      </p>
    </div>
  </div>
</section>