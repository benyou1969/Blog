<?php

use Faker\Generator as Faker;
use App\Community;

$factory->define(Community::class, function (Faker $faker) {
    $word = $faker->word;
    return [
        "name" => $word,
        "slug" => $word,
    ];
});
