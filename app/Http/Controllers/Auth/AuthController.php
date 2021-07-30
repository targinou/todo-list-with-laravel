<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\AuthRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request, UserRepository $userRepository, AuthRepository $authRepository): JsonResponse
    {
        try {
            $this->validate($request, [
                'name' => 'required|min:3|max:80',
                'email' => 'required|unique:users|min:5|max:80',
                'password' => 'required|min:6|max:50',
            ]);
            $user = $userRepository->create($request->all());
            $authRepository->attemptLogin($request->only('email', 'password'));
            $token = $authRepository->getToken();

        } catch (ValidationException $exception) {
            return response()->json(['errors' => $exception->errors()], 400);
        }

        return response()->json(['data' => ['user' => $user['data'], 'accessToken' => $token]], 201);
    }

    public function login(Request $request, AuthRepository $authRepository): JsonResponse
    {
        try {
            $this->validate($request, [
                'email' => 'required|exists:users',
                'password' => 'required',
            ]);
            if (!$authRepository->attemptLogin($request->only('email', 'password')))
                return response()->json(['errors' => ['password' => ['wrong password']]], 400);
            $user = $authRepository->getUser();
            $token = $authRepository->getToken();
        } catch (ValidationException $exception) {
            return response()->json(['errors' => $exception->errors()], 400);

        }
        return response()->json(['data' => ['user' => $user, 'accessToken' => $token]], 200);
    }

}


