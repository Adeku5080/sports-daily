<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController
{
    /**
     * Shows a page of all posts.
     */
    public function index()
    {
    }

    /**
     * Show details of a post.
     *
     * @param Post $post
     */
    public function show(Post $post)
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
            'title' => 'required|max:100|min:5',
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
