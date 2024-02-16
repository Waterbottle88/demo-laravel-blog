<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('post', compact('post'));
    }
}
