<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function index(User $user, $following)
    {
        if ($following !== 'following' && $following !== 'follower') {
            return redirect(route('profile', $user->username));
        }
        return view('users.following', [
            'user' => $user,
            'follows' =>  $following == 'following' ? $user->follows : $user->followers,
        ]);
    }

    public function store(Request $request, User $user)
    {
        Auth::user()->hasFollow($user) ? Auth::user()->unfollow($user)
            : Auth::user()->follow($user);

        return back()->with("success", "Anda telah mengikuti akun ini");
    }
}
