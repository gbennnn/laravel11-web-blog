<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $judul = [
            'Laravel 8',
            'Laravel 9',
            'Laravel 10',
            'Laravel 11',
            'Laravel 12',
        ];

        foreach ($judul as $title) {
            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => Str::random(100),
                'content' => Str::random(1000),
                'status' => 'publish',
                'thumbnail' => 'https://via.placeholder.com/640x480.png',
                'user_id' => 1,
            ]);
        }
    }
}
