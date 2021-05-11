<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * show homepage with posts.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $posts = Post::all()->sortByDesc('created_at');
        $popularPosts = $this->fetchAllPostMostComments();
        $recentPosts = $this->mostRecentPosts();
        return view('home', compact('posts', 'popularPosts','recentPosts'));
    }

    /**
     * fetch posts with most commments
     *
     * @return mixed
     */
    public function fetchAllPostMostComments()
    {
        return Post::selectRaw(
            '*, (select count(*) from `comments` `c` where `c`.post_id = `posts`.id) as comment_count'
        )->orderBy('comment_count', 'desc')
            ->limit(5)
            ->get();
    }

    /**
     * fetch most recently created post
     *
     * @return mixed
     */
    public function mostRecentPosts()
    {
        return Post::selectRaw(' * '
        )->orderBy('created_at','desc')
            ->limit(3)
            ->get();
    }
}
