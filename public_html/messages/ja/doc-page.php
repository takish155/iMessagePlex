<?php

$locale = getLocale();

return [
  "docs" => [
    "title" => "ドキュメント",
    "description" => "iMessagePlex公式ドキュメント：サーバーレスフォームと無料APIサービスを簡単に学び、統合し、管理するための完全なリソースです",
    "gettingStartedTitle" => "はじめに",
    "gettingStartedDescription" => "iMessagePlexのドキュメントへようこそ！以下の手順に従って、コンタクトフォームをセットアップおよび管理してください。",
    "setupFormTitle" => "フォームをセットアップする",
    "setupFormDescription" => "メッセージを送信するための最も基本的なコンタクトフォームを作成する方法です。",
    "handleFormTitle" => "JavaScriptでフォームを処理する",
    "handleFormDescription" => "JavaScriptを使用してフォームデータを処理し、HTTP POSTリクエストをサーバーに送信します。",
    "requiredBodyJsonTitle" => "必要なJSONボディ",
    "requiredBodyJsonEndpoint" => "POST: https://imessageplex.com/$locale/user/message/{YOUR_USERNAME}",
    "requiredBodyJsonFields" => [
      "apiKey" => '"apiKey": 文字列',
      "name" => '"name": 文字列 (3-100文字)',
      "email" => '"email": 文字列 (3-100文字)',
      "message" => '"message": 文字列 (3-3000文字)'
    ],
    "apiKeyNote" => "APIキーはアカウントダッシュボードから取得してください。忘れた場合は、新しいキーを生成する必要があります。その際、前のキーが<strong class=\"text-error\">無効</strong>になりますので、注意して進めてください。",
    "responsesTitle" => "レスポンス",
    "responses" => [
      "200" => "200: メッセージを正常に送信しました",
      "400" => "400: 不正なリクエスト (リクエストボディが間違っています)",
      "401" => "401: 無効なAPIキー"
    ],
    "exampleTitle" => "例"
  ]
];
