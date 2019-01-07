<?php
/**
 * Created by PhpStorm.
 * User: Marc LAW: zunly@hotmail.com
 * Date: 2019/1/7
 * Time: 16:22
 */

use Faker\Generator as Faker;


$factory->define(App\Models\Follower::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'user_id' => random_int(1, 10),
        'follower_id' => random_int(1, 10),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
