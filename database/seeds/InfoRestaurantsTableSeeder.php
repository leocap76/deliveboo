<?php

use Illuminate\Database\Seeder;
use App\InfoRestaurant;
use App\User;
use Illuminate\Support\Str;

class InfoRestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $infoRestaurants = config('info_restaurants');

        $users = User::all();

        foreach ($users as $key => $user) {
            $infoRestaurant = new InfoRestaurant();

            $infoRestaurant->user_id = $user->id;
            $infoRestaurants[$key]['slug'] = Str::slug($infoRestaurants[$key]['name']);
            $infoRestaurant->fill($infoRestaurants[$key]);

            $infoRestaurant->save();
        }
    }
}
