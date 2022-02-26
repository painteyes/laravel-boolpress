<?php

use Illuminate\Database\Seeder;
// --------------------------------
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserInfoSeeder::class);
        $this->call(CategoriesTableSeeder::class); 

        /** If you also want to seed the foreign key 
         * you must first seed the categories 
         * because it match the category id */
        $this->call(PostsTableSeeder::class);

        $this->call(TagsTableSeeder::class);
        
    }
}
