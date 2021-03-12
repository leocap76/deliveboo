<?php

use Illuminate\Database\Seeder;
use App\Plate;
use App\User;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plates = config('plates');

        $users = User::all();

        foreach($users as $key => $user) {
            $db = new Plate();
            
            $db->user_id = $user->id;
            $db->fill($plates[$key]);
            $db->save();
        }
    }
}
