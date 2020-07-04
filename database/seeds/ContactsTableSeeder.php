<?php

use Illuminate\Database\Seeder;
use App\Contact;
use App\User;
class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all();
        $users->each(function($user){
            factory(Contact::class,20)->create([
                'user_id' => $user->id
            ]);
        });
        
    }
}
