<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Follower;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run_back()
    {
        $users = User::all();
        $user = $users->first();

        // 获取去除掉 ID 为 1 的所有用户 ID 数组
        $followers = $users->slice(1);
        $follower_ids = $followers->pluck('id')->toArray();

        // 关注除了 1 号用户以外的所有用户
        $user->follow($follower_ids);

        // 除了 1 号用户以外的所有用户都来关注 1 号用户
        foreach ($followers as $follower) {
            $follower->follow(1);
        }
    }

    public function run()
    {
        $followers = factory(Follower::class)->times(500)->make();
        Follower::insert($followers->toArray());
    }
}
