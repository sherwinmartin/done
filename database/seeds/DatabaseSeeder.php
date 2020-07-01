<?php

use Illuminate\Database\Seeder;

use App\Incident;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        factory(User::class, 50)->create();
        factory(Incident::class, 500)->create();
    }
}
