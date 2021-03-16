<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * show homepage with posts.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $posts = Post::all();

        return view('home', compact('posts'));
    }
}
