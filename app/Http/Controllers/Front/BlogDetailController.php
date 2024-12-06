<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class BlogDetailController extends Controller
{
    public function detail($slug)
    {
        echo ("$slug");
    }
}
