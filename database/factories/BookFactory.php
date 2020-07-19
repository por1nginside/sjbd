<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use App\Book;
use App\User;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    $users = User::pluck('id')->toArray();
    $authors = Author::pluck('id')->toArray();

    return [
        'name' => $faker->title,
        'page_count' => $faker->numberBetween(200, 800),
        'annotation' => $faker->sentence(5),
        'image' => $faker->sha256,
        'author_id' => $faker->randomElement($authors),
        'user_id' => $faker->randomElement($users),
    ];
});
