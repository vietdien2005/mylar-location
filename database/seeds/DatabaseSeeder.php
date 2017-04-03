<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(createUsers::class);
    }
}

class createUsers extends Seeder
{
    public function run()
    {
        User::create([
            'name'     => "Admin",
            'email'    => "admin@mylar.com",
            'password' => Hash::make("12345678"),
        ]);
    }
}
