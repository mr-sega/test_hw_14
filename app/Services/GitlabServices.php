<?php

namespace App\Services;

class GitlabServices
{
    public static function link(): string {
        $params = [
            'client_id' => config('oauth.gitlab.client_id'),
            'redirect_uri' => config('oauth.gitlab.callback_uri'),
            'scope' => 'read:user user:email'
        ];

        return 'https://gitlab.com/oauth/authorize' . http_build_query($params);
    }
}
