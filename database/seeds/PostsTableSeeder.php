<?php

use Illuminate\Database\Seeder;
// ----------------------------
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Category;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $recipes = config('recipes');

        foreach ($recipes as $recipe) {
            $new_post = new Post();
            $new_post->title = $recipe['title'];
            $new_post->content = $faker->paragraphs(3, true);
            $new_post->slug = Str::slug(Post::getUniqueSlug($new_post->title));

            $new_post->save();

            /** FOREIGN KEY */
            /** It only works if a category table already exists 
             * because the foreign key must match a category id */

            // if(Category::where('name', '=', $recipe['category']) {

            //     $new_post->tags()->sync(Category::where('name', '=', $recipe['category'])->first()->id) ;

            // }

        }        
    }
}
