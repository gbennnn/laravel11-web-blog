<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomepageController extends Controller
{
    public function index()
    {
        $data = Post::where('status', 'publish')->orderBy('id', 'desc')->paginate(5);

        return view('components/front.home-page', compact('data'));
    }
}
