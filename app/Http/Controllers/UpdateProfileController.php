<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'string|min:3|required',
            'email' => 'email|string|min:3|required|unique:users,email,' . auth()->id(),
            'username' => ['alpha_num', 'required', 'unique:users,username,' . auth()->id()],
        ]);

        auth()->user()->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect(route('profile', Auth::user()->username))->with('success', 'Your profile has been updated');
    }
}
