<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    /**
     * Store new post in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function storeComment(Request $request, Post $post): RedirectResponse
    {
        $this->validateStore($request);
        $this->createComment($request, $post);

        return redirect()->route('show',['post' => $post->id])->with([
            'status' => 'comment was created'
        ]);
    }

    /**
     * Validate the 'store' request.
     *
     * @param Request $request
     */
    private function validateStore(Request $request)
    {
        $request->validate([

            'content' => 'required|min:5'
        ]);
    }

    /**
     * Create a new comment.
     *
     * @param Request $request
     * @param Post $post
     */
    private function createComment(Request $request ,Post $post)
    {
        Comment::create([

            'content' => $request['content'],
            'user_id'=>Auth::user()->id,
            'post_id'=>$post->id
        ]);
    }
}
