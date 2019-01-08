<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class FollowerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['followers', 'followings']]);
    }

    public function followers(User $user)
    {
        $users = $user->followers()->paginate(30);
        $type = 'followers';
        return view('followers.show', compact('users', 'user', 'type'));
    }

    public function followings(User $user)
    {
        //$users = $user->followings()->paginate(30);

        $users = $user->followings()->paginate(config('database.per_page'));
        $type = 'followings';
        return view('followers.show', compact('users', 'user', 'type'));
    }

    public function follow(User $user)
    {
        $this->authorize('follow', $user);
        if (!Auth::user()->isFollowing($user->id)) {
            Auth::user()->follow($user->id);
        }
        session()->flash('success', '你粉了Ta了！');

        return redirect()->route('users.show', $user->id);
    }

    public function unfollow(User $user)
    {
        $this->authorize('follow', $user);
        if (Auth::user()->isFollowing($user->id)) {
            Auth::user()->unfollow($user->id);
        }
        session()->flash('success', '取关了！');

        return redirect()->route('users.show', $user->id);

    }

}
