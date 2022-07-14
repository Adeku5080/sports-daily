<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * adding auth middleware
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

//    /**
//     * Shows a page of all posts.
//     */
//    public function index()
//    {
//    }

    /**
     * Show details of a post.
     *
     * @param Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        return view('show', compact('post'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('create');

    }

    /**
     * Store new post in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validateStore($request);
        $this->createPost($request);
        return redirect()->route('home');
    }

    /**
     * Validate the 'store' request.
     *
     * @param Request $request
     */
    private function validateStore(Request $request)
    {
        $request->validate([
            'title' => 'required|max:1000|min:5',
            'content' => 'required|min:10'
        ]);
    }

    /**
     * Create a new post.
     *
     * @param Request $request
     */
    private function createPost(Request $request)
    {
        Post::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id'=>Auth::user()->id
        ]);
    }

    /**
     * Show form to update.
     *
     * @param Post $post
     */
    public function edit(Post $post)
    {

        return view('edit', compact('post'));
    }

    /**
     * Update the post in storage.
     *
     * @param Post $post
     * @param Request $request
     */
    public function update(Post $post, Request $request): RedirectResponse
    {
        if(Gate::denies('post.update', $post)) {
            abort(403 ,'you cant edit this blogpost');
        }
        $validated = $request->validate([
            'title' => 'required|max:100|min:5',
            'content' => 'required|min:10'
        ]);
        $post->fill($validated);
        $post->save();

        return redirect()->route('show', ['post' => $post->id]);
    }

    /**
     * Delete from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     * @throws Exception
     */
    public function delete(Post $post): RedirectResponse
    {

        $post->delete();

        return redirect()->route('home')->with([
            'status' => 'Blogpost was deleted'
        ]);
    }




}
