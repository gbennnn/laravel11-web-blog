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
        return view('components.Front.blog-detail', compact('data'));
    }
}
