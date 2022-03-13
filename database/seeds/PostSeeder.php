<?php

use App\Model\Category;
use App\Model\Post;
use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $title = $faker->sentence();
        // $title = '$faker->sentence()';

        $post = Post::create([
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $faker->paragraph(2),
            'content' => $faker->paragraph(10),
            'user_id' => 1
        ]);

        $category = Category::first();
        $post->categories()->attach($category->id);
    }
}
