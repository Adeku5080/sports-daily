<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * register a user
     *
     * @return JsonResponse
     *
     */
    public function register(Request $request): JsonResponse
    {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|confirmed|min:8',
         ]);

        $user= User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
         ]);

         $token = $user->createToken('my-app-token')->plainTextToken;

         $response = [
             'user' => $user,
             'token' => $token
         ];

         return new JsonResponse($response,201);
    }

    /**
     * log the user in
     *
     */
    public function login(Request $request): JsonResponse
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return new JsonResponse(['message' => 'wrong credentials'], 404);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return new JsonResponse($response, 200);
    }

}


