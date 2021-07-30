<?php


namespace App\Repositories;


use App\Models\Task;
use \Illuminate\Contracts\Auth\Authenticatable;

class TaskRepository
{
    protected Task $model;

    public function __construct()
    {
        $this->model = new Task();
    }

    public function create(array $requestData, $id): array
    {
        $requestData['user_id'] = $id;
        $requestData['status'] = false;
        $task = $this->model->create($requestData);

        return ['data' => $task];
    }

    public function getTasks(Authenticatable $user): array
    {
        return ['data' => $user->tasks()->get()];
    }

    public function toggleStatus($id): void
    {
        $task = $this->getTaskByID($id);
        $task->update(['status'=>!$task->status]);

    }

    public function getTaskByID($id)
    {
        return $this->model->find($id);
    }

}
