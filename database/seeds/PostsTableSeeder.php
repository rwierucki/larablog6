<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(Post::class, 4)->create();
        foreach (range(1, 10) as $i) {
            $factory = factory(Post::class);
            if ($i % 2 === 0) {
                $factory->state('image');
            }
            $factory->create();
        }
    }
}
