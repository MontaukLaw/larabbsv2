<?php
/**
 * Created by PhpStorm.
 * User: Marc LAW: zunly@hotmail.com
 * Date: 2019/1/7
 * Time: 10:02
 */

use Faker\Generator as Faker;


$factory->define(App\Models\Article::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;

    return [
        'title' => $faker->sentence(),
        'content' => $faker->text(),
        'created_at' => $date_time,
        'updated_at' => $date_time,
        'user_id' => random_int(1, 3),
    ];
});
