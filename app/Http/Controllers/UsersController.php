<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController
{
    public function index()
    {

        $users = User::query()->orderBy('created_at', 'desc')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required'],
           'email' => ['required', 'email', 'unique:users,email'],
           'password' => ['required', 'confirmed'],
           'password_confirmation' => ['required'],
        ]);

        User::create($request->all());

        return redirect()->route('users.index');
    }

    public function show($id)
    {
    }

    public function edit(User $user)
    {
        return view('users.update', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        $user->update($request->all());

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
