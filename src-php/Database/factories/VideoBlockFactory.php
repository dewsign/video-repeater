<?php

use Faker\Generator as Faker;
use Dewsign\VideoRepeater\Video;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'platform' => 'default',
        'link' => 'https://www.youtube.com/watch?v=vRZbGorgHB4',
    ];
});