<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowerController extends Controller
{
    public function followers(User $user)
    {
        $users = $user->followers()->paginate(30);
        $type = 'followers';
        return view('followers.show', compact('users', 'user', 'type'));
    }

    public function followings(User $user)
    {
        //$users = $user->followings()->paginate(30);

        $users = $user->followings()->paginate(config('PER_PAGE'));
        $type = 'followings';
        return view('followers.show', compact('users', 'user', 'type'));
    }

}
