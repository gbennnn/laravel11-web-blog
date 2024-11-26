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
        $judul =  [
            'Understanding PHP 8',
            'Mastering JavaScript',
            'Introduction to Vue.js',
            'Advanced CSS Techniques',
            'Getting Started with React',
        ];
        foreach ($judul as $title) {
            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => 'Deskripsi untuk ' . $title,
                'content' => 'Kontent untuk ' . $title,
                'status' => 'publish',
                'thumbnail' => 'https://via.placeholder.com/640x480.png',
                'user_id' => 1,
            ]);
        }
    }
}
