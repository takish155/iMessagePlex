<?php

use Framework\Session;

if (Session::has("flash_success_message")) : ?>
  <div class="w-[95%] mx-auto text-sm mt-2 mb-10   alert alert-success">
    <p><?= Session::getFlashMessage("success_message") ?></p>
  </div>
<?php endif ?>