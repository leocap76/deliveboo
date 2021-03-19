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

            foreach ($categories as $key => $category) {
                $newCategory = new $newUser->categories(); 

                $newCategory->category_id = $key + 1;
                $newCategory->user_id = $firstKey + 1;

                $newCategory->save();
            }

            $user['password'] = Hash::make($user['password']);
            $newUser->fill($user);
            $newUser->save();
        }
    }
}
