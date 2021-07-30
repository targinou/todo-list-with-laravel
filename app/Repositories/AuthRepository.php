<?php


namespace App\Repositories;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function attemptLogin(array $data): bool
    {
        return Auth::attempt($data);
    }

    public function getUser(): ?Authenticatable
    {
        return Auth::user();
    }

    public function getToken()
    {
        return Auth::user()->createToken('authToken')->accessToken;
    }
}
