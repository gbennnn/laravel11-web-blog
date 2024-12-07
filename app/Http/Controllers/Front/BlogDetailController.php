<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Http\Controllers\Controller;

class BlogDetailController extends Controller
{
    public function detail($slug)
    {
        // echo ("$slug");

        $data = Post::where('status', 'publish')->where('slug', $slug)->first();
        // $data = Post::where('status', 'publish')->where('slug', $slug)->firstOrFail();

        $pagination = $this->pagination($data->id);

        return view('components.Front.blog-detail', compact('data', 'pagination'));
    }

    private function pagination($id)
    {
        $dataPrev = Post::where('status', 'publish')->where('id', '<', $id)->orderBy('id', 'desc')->first();
        $dataNext = Post::where('status', 'publish')->where('id', '>', $id)->orderBy('id', 'desc')->first();

        $data = [
            'prev' => $dataPrev,
            'next' => $dataNext
        ];

        return $data;
    }
}