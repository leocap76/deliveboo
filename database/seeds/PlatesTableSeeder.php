<?php

use Illuminate\Database\Seeder;
use App\Plate;
use App\User;
use Illuminate\Support\Str;

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
            $plates[$key]['slug'] = Str::slug($plates[$key]['name']);
            $db->fill($plates[$key]);
            $db->save();
        }
    }
}
