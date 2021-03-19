<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $users = config('users');

        $categories = config('categories');

        foreach ($users as $firstKey => $user) {
            $newUser = new User();

            $user['password'] = Hash::make($user['password']);
            $newUser->fill($user);
            $newUser->save();
        }

        $arrUsers = User::all();

         foreach($arrUsers as $singleUser) {
            $newArr = [];

            foreach ($categories as $key => $category) {
                $newArr['id'] = [$key + 1];
                $singleUser->categories()->attach($newArr['id']);
            }
         }
    }
}