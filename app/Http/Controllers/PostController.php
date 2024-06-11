<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('posts', []);
    }

    public function show(string $id): View
    {
        return view('post', [
            'post' => Post::findOrFail($id)
        ]);
    }
}
