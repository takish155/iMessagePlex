<header class="w-full py-4 flex justify-around items-center top-0 sticky z-50 bg-base-200">
  <div class="flex items-center gap-4">
    <a href="/">
      <h1 class="text-2xl max-sm:text-lg font-bold">iMessagePlex</h1>
    </a>
    <nav class="max-sm:hidden">
      <ul class="text-sm flex gap-2 font-thin">
        <a href="/#features">
          <li>Features</li>
        </a>
        <a href="/docs">
          <li>Documentation</li>
        </a>
      </ul>
    </nav>
  </div>
  <?php

  use Framework\Session;

  if (Session::isAuthenticated()) : ?>
    <div class="flex gap-4">
      <a href="/dashboard">
        <button class="btn btn-primary btn-sm text-sm">Dashboard</button>
      </a>
      <form action="/auth/sign-out" method="POST">
        <input type="hidden" name="_method" value="DELETE" />
        <button class="btn btn-outline border-error text-error btn-sm text-sm">Sign Out</button>
      </form>
    </div>
  <?php else: ?>
    <a href="/auth/sign-in">
      <button class="btn btn-primary btn-sm text-sm">Sign In</button>
    </a>
  <?php endif ?>
  </a>
</header>