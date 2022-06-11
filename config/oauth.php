<?php

return [
  'gitlab' => [
      'client_id' => env('OAUTH_GITLAB_CLIENT_ID'),
      'client_secret' => env('OAUTH_GITLAB_CLIENT_SECRET'),
      'callback_uri' => env('OAUTH_GITLAB_CALLBACK_URI'),
  ]
];
