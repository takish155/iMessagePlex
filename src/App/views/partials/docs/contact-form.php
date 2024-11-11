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
?>

<div class="mockup-code w-[80%] max-sm:w-[95%] mb-10">
  <pre>
    <code class="language-html">
      <?= htmlspecialchars($htmlSnippet); ?>
     </code>
  </pre>
</div>