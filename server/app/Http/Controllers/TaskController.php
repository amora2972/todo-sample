<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $tasks = Task::with('user');

        if ($request->filled('status')) {
            $tasks->where('status', $request->get('status'));
        }

        return $this->success(TaskResource::collection($tasks->get()));
    }

    public function show(Task $task): JsonResponse
    {
        return $this->success(new TaskResource($task->load('user')));
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = Task::create($request->validated());

        return $this->success(new TaskResource($task), __('Task Created Successfully'));
    }

    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $task->update($request->validated());

        return $this->success(message: __('Task Updated Successfully'));
    }

    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return $this->success(message: __('Task Deleted Successfully'));
    }
}
