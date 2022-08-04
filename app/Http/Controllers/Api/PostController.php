<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * fetch all posts
     *
     * @return JsonResponse
     */
    public function index()
    {
        $posts = Post::all();
        return new JsonResponse(['data' => $posts]);
    }

    /**
     * create a post
     *
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:2000|min:5',
            'content' => 'required|min:10'
        ]);

        Post::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => Auth::id()
        ]);

        return new JsonResponse(null, 201);

    }

    /**
     * @param Post $post
     * @return JsonResponse
     */
    public function show(Post $post)
    {
        if (!$post) {
            return new JsonResponse(['message' => 'Record not found'], 404);
        }
        return new JsonResponse(['data' => $post], 200);
    }

    /**
     * update a post
     *
     * @return JsonResponse
     */
    public function update(Request $request,Post $post): JsonResponse
    {
        if (!$post) {
            return new JsonResponse(['message' => 'record not found'], 404);
        }
        $post->update($request->all());
        return new JsonResponse($post, 202);
    }

    /**
     * delete a post
     *
     */
    public function delete(Request $request,Post $post)
    {
        if (!$post) {
            return new JsonResponse(['message' => 'record not found'], 404);
        }
        $post->delete();
        return new JsonResponse( 200);
    }
}

