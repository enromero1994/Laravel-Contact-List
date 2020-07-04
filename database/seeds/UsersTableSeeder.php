<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Juan',
            'email' => 'holamundo@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        factory(User::class,10)->create();
    }
}
