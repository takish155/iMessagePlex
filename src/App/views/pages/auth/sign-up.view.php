<!DOCTYPE html>
<html lang="en">

<?= loadPartials("html-head", [
  "title" => "Sign-Up - iMessagePlex",
]) ?>

<body>
  <!-- Header -->
  <?= loadPartials("header") ?>

  <main class="min-h-screen">
    <section class="card shadow-xl w-[95%] mx-auto max-w-[400px] mb-16">
      <form class="card-body" method="POST">
        <h2 class="text-center font-semibold text-2xl"><?= $t["title"] ?></h2>
        <p class="text-sm text-center mb-6"><?= $t["description"] ?></p>
        <div class="mb-6">
          <?= loadPartials("alert-danger", [
            "message" => $errors["server"] ?? ""
          ]) ?>
          <input required
            value="<?= $username ?? "" ?>"
            minlength="3"
            maxlength="30"
            name="username"
            class="<?= str_contains($errors["server"] ?? "", "Username") ? "border-error" : ""  ?> input input-sm input-bordered w-full mx-auto mb-4"
            placeholder="<?= $t["username"] ?>" />
          <input
            value="<?= $email ?? "" ?>"
            required
            minlength="5"
            maxlength="100"
            name="email"
            class="<?= str_contains($errors["server"] ?? "", "Email") ? "border-error" : ""  ?> input input-sm input-bordered w-full mx-auto mb-4"
            placeholder="<?= $t["email"] ?>"
            type="email" />
          <input
            value="<?= $password ?? "" ?>"
            required
            minlength="6"
            maxlength="100"
            name="password"
            class="input input-sm input-bordered w-full mx-auto mb-4"
            placeholder="<?= $t["password"] ?>"
            type="password" />
          <input
            value="<?= $confirmPassword ?? "" ?>"
            required
            minlength="6"
            maxlength="100"
            name="confirm-password"
            class="<?= !empty($errors[0]["confirmPassword"]) ? "border-error mb-2" : "mb-4"  ?> input input-sm input-bordered w-full mx-auto"
            placeholder="<?= $t["confirmPassword"] ?>"
            type="password" />
          <?php if (!empty($errors[0]["confirmPassword"])): ?>
            <p class="text-error text-xs mb-4"><?= $errors[0]["confirmPassword"] ?></p>
          <?php endif ?>
        </div>
        <button class="btn btn-sm btn-primary w-full mx-auto mb-2"><?= $t["createAccount"] ?></button>
        <div class="divider text-xs">
          OR
        </div>
        <a href="/auth/sign-in">
          <button type="button" class="btn btn-sm btn-outline w-full mx-auto"><?= $t["title"] ?></button>
        </a>
      </form>
    </section>
  </main>
  <?= loadPartials("footer"); ?>



</body>

</html>