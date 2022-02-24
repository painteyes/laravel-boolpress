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
        if (User::find(1)) {
            $new_user_info = new UserInfo();
            $new_user_info->phone = $faker->phoneNumber();
            $new_user_info->address = $faker->streetAddress();
            $new_user_info->user_id = 1;
            $new_user_info->save();
        }     
    }
}
