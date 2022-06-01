<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{

    public function index()
    {
        return response()->success([
            'data' => Task::where('user_id', auth()->id())->get()
        ]);
    }

    public function show($id)
    {
        $task = Task::where('id', $id)->where('user_id', auth()->id())->with('tags')->get();
        if ($task->isEmpty()) return response()->error('data not found', 404);
        return response()->success(TaskResource::collection($task));
    }

    public function store(CreateTaskRequest $request)
    {

        $task = Task::create([
            'user_id' => auth()->id(),
            'name' => $request->task_name,
            'description' => $request->description,
        ] + $request->validated());

        if ($request->tags) {
            $task->tags()->attach($request->tags);
        }

        return response()->success(['data' => $task]);
    }
}
