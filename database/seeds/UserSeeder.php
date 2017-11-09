<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'believe2013',
            'email' => 'believe.koenig@gmail.com',
            'password' => bcrypt('ererer10'),
            'remember_token' => str_random(10),
            'is_active' => 1
        ]);

        factory(User::class, 10)->create();
    }
}
