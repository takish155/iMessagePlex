<!DOCTYPE html>
<html lang="en">

<?= loadPartials("html-head", [
  "title" => "Sign-In - iMessagePlex",
]) ?>

<body>
  <!-- Header -->
  <?= loadPartials("header") ?>

  <main class="min-h-screen">
    <section class="card shadow-xl w-[95%] mx-auto max-w-[400px]">
      <form class="card-body" method="POST">
        <h2 class="text-center font-semibold text-2xl"><?= $t["title"] ?></h2>
        <p class="text-sm text-center mb-6"><?= $t["description"] ?></p>
        <div class="mb-6">
          <?= loadPartials("alert-danger", [
            "message" => $errors["credentials"] ?? ""
          ]) ?>
          <input
            required
            minlength="3"
            maxlength="30"
            value="<?= $username ?? "" ?>"
            name="username"
            class="<?= !empty($errors[0]["username"]) ? "border-error" : ""  ?> input input-sm input-bordered w-full mx-auto mb-4"
            placeholder="<?= $t["username"] ?>" />
          <input value="<?= $password ?? "" ?>"
            required
            minlength="6"
            maxlength="100"
            name="password"
            class="<?= !empty($errors[0]["password"]) ? "border-error" : ""  ?> input input-sm input-bordered w-full mx-auto mb-2"
            placeholder="<?= $t["password"] ?>"
            type="password" />
        </div>
        <button class="btn btn-sm btn-primary w-full mx-auto mb-2"><?= $t["title"] ?></button>
        <div class="divider text-xs">
          OR
        </div>
        <a href="/<?= $locale ?>/auth/sign-up">
          <button class="btn btn-sm btn-outline w-full mx-auto" type="button"><?= $t["dontHaveAccount"] ?></button>
        </a>
      </form>
    </section>
  </main>
  <?= loadPartials("footer"); ?>
</body>

</html>