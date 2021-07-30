<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Repositories\AuthRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function registerTask(Request $request, TaskRepository $taskRepository, AuthRepository $authRepository): JsonResponse
    {
        try {
            $this->validate($request, [
                'title' => 'required'
            ]);

            $task = $taskRepository->create($request->all(), $authRepository->getUser()->id);

            return response()->json(['data' => ['task' => $task['data']]], 201);

        } catch (ValidationException $exception) {
            return response()->json(['errors' => $exception->errors()], 400);
        }
    }

    public function getUserTasks(TaskRepository $taskRepository, AuthRepository $authRepository): JsonResponse
    {
        $user = $authRepository->getUser();
        $tasks = $taskRepository->getTasks($user);

        return response()->json(['data' => ['tasks' => $tasks['data']]], 200);
    }

    public function toggleTaskStatus($id, TaskRepository $taskRepository): JsonResponse
    {
        $taskRepository->toggleStatus($id);
        return response()->json(['status' => 'success'], 200);
    }


}
