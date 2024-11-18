<?php
$htmlSnippet = '
<!-- index.html -->
<div class="contact-form">
    <form id="contact-form" onsubmit="">
      <input id="name" name="name" type="text" placeholder="Enter Your Name" required>
      <input id="email" name="email" type="email" placeholder="Enter Your Email" required>
      <textarea id="message" name="message" cols="40" rows="5" placeholder="Enter Your Message" required></textarea>
      <input  type="submit" value="Submit" class="send">
    </form>
</div>
';

$javascriptSnippet = '
// main.js
const form = document.getElementById("contact-form");

form.addEventListener("submit", async (event) => {
  event.preventDefault();

  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const message = document.getElementById("message").value;

  const url = "https://imessageplex.com/user/message/{YOUR_USERNAME}";

  const response = await fetch(url, {
    method: "POST",
    body: JSON.stringify({
      name,
      email,
      message,
      apiKey: {YOUR_API_KEY (Make sure to hide this with ENV)},
    }),
  });

  if (response.ok) {
    alert("Message was sent successfully!");
  }
});
'

?>


<section class="w-[95%] mx-auto mb-[10rem]">
  <h2 class="text-4xl font-bold text-center mb-8"><?= $t ?></h2>
  <div class="mockup-code w-[95%] max-w-[1100px] mx-auto mb-4">
    <pre>
      <code class="language-html">
        <?= htmlspecialchars($htmlSnippet); ?>
      </code>
    </pre>
  </div>
  <div class="mockup-code w-[95%] max-w-[1100px] mx-auto">
    <pre>
      <code class="language-javascript">
        <?= htmlspecialchars($javascriptSnippet); ?>
      </code>
    </pre>
  </div>
</section>