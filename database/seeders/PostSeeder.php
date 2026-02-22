<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str as SupportStr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1er post avec image 
        Post::create([
            'title' =>
            'Premier article',
            'image' => 'postImage/image1.jpg',
            'slug' => SupportStr::slug('Premier article'),
            'CreationDate' => now(),
            'like' => 0,
            'user_id' => 1,
            'category_id' => 1,
            'content' => 'Ceci est le contenu du premier article avec une image.',
        ]); // 2e post avec image
        Post::create([
            'title' =>
            'Deuxième article',
            'image' => 'postImage/image2.jpg',
            'slug' => SupportStr::slug('Deuxième article'),
            'CreationDate' => now(),
            'like' => 0,
            'user_id' => 1,
            'category_id' => 2,
            'content' => 'Ceci est le contenu du deuxième article avec une image.',
        ]);
        // 3e post avec image
        Post::create([
            'title' => 'Troisième article',
            'image' => 'postImage/image3.jpg',
            'slug' => SupportStr::slug('Troisième article'),
            'CreationDate' => now(),
            'like' => 0,
            'user_id' => 1,
            'category_id' => 1,
            'content' => 'Ceci est le contenu du troisième article avec une image.',
        ]); // 4e post sans image
        Post::create([
            'title' => 'Quatrième article',
            'image' => null,
            'slug' => SupportStr::slug('Quatrième article'),
            'CreationDate' => now(),
            'like' => 0,
            'user_id' => 1,
            'category_id' => 2,
            'content' => 'Ceci est le contenu du quatrième article sans image.',
        ]); // 5e post sans image 
        Post::create([
            'title' => 'Cinquième article',
            'image' => null,
            'slug' => SupportStr::slug('Cinquième article'),
            'CreationDate' => now(),
            'like' => 0,
            'user_id' => 1,
            'category_id' => 1,
            'content' => 'Ceci est le contenu du cinquième article sans image.',
        ]);
    }
}
