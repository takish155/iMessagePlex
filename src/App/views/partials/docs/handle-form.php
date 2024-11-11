<?php
$jsSnippet = '
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
';
?>

<div class="mockup-code w-[80%] max-sm:w-[95%] mb-10">
  <pre>
    <code class="language-javascript">
      <?= htmlspecialchars($jsSnippet); ?>
     </code>
  </pre>
</div>