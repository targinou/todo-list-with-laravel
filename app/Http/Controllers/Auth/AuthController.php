<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\AuthRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request, UserRepository $userRepository, AuthRepository $authRepository)
    {
        //dd($request->all());
        try {
            $this->validate($request, [
                'name' => 'required|min:3|max:80',
                'email' => 'required|unique:users|min:5|max:80',
                'password' => 'required|min:6|max:50',
            ]);
            $user = $userRepository->create($request->all());
            Auth::login($user['data']);
            $authRepository->attemptLogin($request->only('email', 'password'));
            //$token = $authRepository->getToken();

        } catch (ValidationException $exception) {
            return redirect('/');
            //return response()->json(['errors' => $exception->errors()], 400);
        }

       // return response()->json(['data' => ['user' => $user['data'], 'accessToken' => $token]], 201);
        return redirect('/dashboard');
    }

    public function login(Request $request, AuthRepository $authRepository)
    {
        try {
            $this->validate($request, [
                'email' => 'required|exists:users',
                'password' => 'required',
            ]);
            if (!$authRepository->attemptLogin($request->only('email', 'password')))
                //return response()->json(['errors' => ['password' => ['wrong password']]], 400);
                return redirect('/login');
            $user = $authRepository->getUser();
            Auth::login($user);
            //$token = $authRepository->getToken();
        } catch (ValidationException $exception) {
            return redirect('/login');
            //return response()->json(['errors' => $exception->errors()], 400);

        }
        return redirect('/dashboard');
        //return response()->json(['data' => ['user' => $user, 'accessToken' => $token]], 200);
    }

}


