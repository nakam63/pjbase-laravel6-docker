<?php

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
        // Create user for you.
        factory(App\User::class)->create(
            ['name' => 'Seattle Taro', 'email' => 'aa@bb.net']
        );
        // Create other users.
        factory(App\User::class, 9)->create();
        // Register message for created user.
        App\User::all()->each(function ($user) {
            factory(App\Message::class, $user->id % 4)->create(['user_id' => $user->id]);
        });

        factory(App\Admin::class)->create(
            ['username' => 'taro', 'password' => bcrypt('jiro')]
        );
    }
}
