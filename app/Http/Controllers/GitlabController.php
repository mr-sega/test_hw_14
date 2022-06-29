<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GitlabController
{
   public function callback(Request $request)
   {
       $response = Http::withHeaders(['Accept' => 'application/json'])
           ->asForm()
           ->post('https://gitlab.com/oauth/token',[
               'client_id' => config('oauth.gitlab.client_id'),
               'client_secret' => config('oauth.gitlab.client_secret'),
               'code' => $request->get('code'),
               'grant_type' => 'authorization_code',
               'redirect_uri' => config('oauth.gitlab.callback_uri'),
           ]);
       $token = $response->json('access_token');
       $tokenType = $response->json('token_type');

       $response = Http::withHeaders(['Authorization' => $tokenType . ' ' . $token])
           ->get('https://gitlab.com/api/v4/user');

       //dd($response->body());

       $user = User::query()
           ->where('email', '=', $response->json('username'))
           ->first();

       if ($user === null) {
           $user = User::create([
               'name' => $response->json('name'),
               'password' => Hash::make(Str::random(8)),
               'email' => $response->json('username')
           ]);
           Auth::login($user);

           return redirect('/');
       }
   }
}
