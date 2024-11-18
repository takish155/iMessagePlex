<?php
$locale = getLocale();

return [
  "docs" => [
    "gettingStartedTitle" => "Getting Started",
    "gettingStartedDescription" => "Welcome to the iMessagePlex documentation! Follow these steps to set up and manage your contact form.",
    "setupFormTitle" => "Set Up a Form",
    "setupFormDescription" => "This is the most basic way to create a contact form for sending messages.",
    "handleFormTitle" => "Handle the Form with JavaScript",
    "handleFormDescription" => "Handle form data using JavaScript to send an HTTP POST request to the server.",
    "requiredBodyJsonTitle" => "Required Body JSON",
    "requiredBodyJsonEndpoint" => "POST: https://imessageplex.com/$locale/user/message/{YOUR_USERNAME}",
    "requiredBodyJsonFields" => [
      "apiKey" => '"apiKey": string',
      "name" => '"name": string (3-100 characters)',
      "email" => '"email": string (3-100 characters)',
      "message" => '"message": string (3-3000 characters)'
    ],
    "apiKeyNote" => "Obtain your API key from your account dashboard. If forgotten, you must generate a new key, which will revoke the previous one, so proceed with caution.",
    "responsesTitle" => "Responses",
    "responses" => [
      "200" => "200: Successfully sent the message",
      "400" => "400: Bad request (Received incorrect request body)",
      "401" => "401: Incorrect API Key"
    ],
    "exampleTitle" => "Example"
  ]
];
