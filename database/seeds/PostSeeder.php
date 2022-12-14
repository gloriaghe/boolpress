<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories_ids = Category::all()->pluck('id');
        $users_ids = User::all()->pluck('id');


        for ($i=0; $i < 150; $i++) {
            $post = new Post;
            $post->user_id = $faker->randomElement($users_ids);
            $post->category_id = $faker->randomElement($categories_ids);
            $post->title = $faker->words(rand(2, 4), true);
            $post->slug = Post::getSlug($post->title);
            // $post->image = 'https://picsum.photos/id/' .rand(1, 300) . '/500/300';
            $number = rand(0, 3);
            if ($number) {
                $contents = new File(__DIR__ . '/../../storage/app/variepost/img(' . $number . ').jpg');
                // $tmp_img_url = $faker->image();
                $post->image = Storage::put('uploads', $contents);
            } else {
                $post->image = null;
            }

            $post->content = $faker->paragraphs(rand(2, 10), true);
            $post->excerpt = $faker->paragraph();
            $post->save();
    }
}
}
