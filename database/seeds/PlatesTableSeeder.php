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
        $restaurant_plates = config('plates');

        $users = User::all();

        $number = 0;


        foreach ($restaurant_plates as $key => $plates) {

            $number += 1;

            foreach ($plates as $plate) {
                $db = new Plate();
                $db->user_id = $number;
                $plate['slug'] = Str::slug($plate['name']);
                $db->fill($plate);
                $db->save();
            }
        }
            
    }
}
