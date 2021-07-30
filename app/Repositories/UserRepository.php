<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    protected User $model;

    public function __construct()
    {
        $this->model = new user();
    }

    public function create(array $requestData): array
    {
        $user = $this->model->create($requestData);

        return ['data' => $user];
    }


}

