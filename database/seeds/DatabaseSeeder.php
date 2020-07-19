<?php

use App\Author;
use App\Book;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create();
        factory(Author::class, 20)->create();
        factory(Book::class, 50)->create();
    }
}
