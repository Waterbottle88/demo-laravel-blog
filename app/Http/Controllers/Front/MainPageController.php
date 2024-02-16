<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class MainPageController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);

        return view('mainpage', compact('posts'));
    }
}
