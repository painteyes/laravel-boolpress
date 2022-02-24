<?php

use Illuminate\Database\Seeder;
// ----------------------------
use Faker\Generator as Faker;
use App\UserInfo;
use App\User;
// ----------------------------


class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $users = User::all();
        if ($users->isNotEmpty()) {
            foreach ($users as $user) {
                $new_user_info = new UserInfo();
                $new_user_info->phone = $faker->phoneNumber();
                $new_user_info->address = $faker->streetAddress();
                $new_user_info->user_id = $user->id;
                $new_user_info->save();
            } 
        }     
    }
}
