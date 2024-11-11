<!DOCTYPE html>
<html lang="en">

<?= loadPartials("html-head", ["title" => "Docs - iMessagePlex"]) ?>

<body data-theme="night">
  <!-- Header -->
  <?= loadPartials("header") ?>

  <main class="w-[95%] mx-auto max-w-[1000px]">
    <!-- Getting Started Section -->
    <section class="my-5">
      <h2 class="text-2xl font-bold mb-2">Getting Started</h2>
      <p class="max-w-[700px]">Welcome to the iMessagePlex documentation! Follow these steps to set up and manage your contact form.</p>
    </section>

    <div class="divider w-full my-10"></div>

    <!-- Setup a Form Section -->
    <section class="my-5">
      <h2 class="text-2xl font-bold mb-2">
        <span class="font-normal text-lg">1.</span> Set Up a Form
      </h2>
      <p class="max-w-[700px] mb-2">This is the most basic way to create a contact form for sending messages.</p>
      <?= loadPartials("docs/contact-form"); ?>
    </section>

    <div class="divider w-full my-10"></div>

    <!-- Handle Form Section -->
    <section class="my-5">
      <h2 class="text-2xl font-bold mb-2">
        <span class="font-normal text-lg">2.</span> Handle the Form with JavaScript
      </h2>
      <p class="max-w-[700px] mb-2">Handle form data using JavaScript to send an HTTP POST request to the server.</p>

      <!-- Required Body JSON Section -->
      <div class="mb-8">
        <h3 class="text-lg font-bold mb-2">Required Body JSON</h3>
        <div class="mockup-code max-w-[700px] mb-2">
          <p class="ml-4 mb-4"><span class="text-primary">POST:</span> <code>https://imessageplex.com/user/message/{YOUR_USERNAME}</code></p>
          <pre data-prefix=">"><code>"apiKey": string</code></pre>
          <pre data-prefix=">"><code>"name": string (3-100 characters)</code></pre>
          <pre data-prefix=">"><code>"email": string (3-100 characters)</code></pre>
          <pre data-prefix=">"><code>"message": string (3-3000 characters)</code></pre>
        </div>
        <p class="max-w-[700px] mb-2">
          Obtain your API key from your account dashboard. If forgotten, you must generate a new key, which will <strong class="text-error">revoke</strong> the previous one, so proceed with caution.
        </p>
      </div>

      <!-- Responses Section -->
      <div class="mb-8">
        <h3 class="text-lg font-bold mb-2">Responses</h3>
        <div class="mockup-code max-w-[700px]">
          <pre data-prefix=">"><code>200: Successfully sent the message</code></pre>
          <pre data-prefix=">"><code>400: Bad request (Received incorrect request body)</code></pre>
          <pre data-prefix=">"><code>401: Incorrect API Key</code></pre>
        </div>
      </div>

      <!-- Example Section -->
      <div class="mb-8">
        <h3 class="text-lg font-bold mb-2">Example</h3>
        <?= loadPartials("docs/handle-form"); ?>
      </div>

    </section>
  </main>
  <?= loadPartials("footer"); ?>
</body>

</html>