<?php

namespace App\Services;

class GitlabServices
{
    public static function link(): string {
        $params = [
            'response_type' => 'code',
            'client_id' => config('oauth.gitlab.client_id'),
            'redirect_uri' => config('oauth.gitlab.callback_uri'),
            'scope' => 'read_user openid'
        ];

        return 'https://gitlab.com/oauth/authorize?' . http_build_query($params);
    }
}
