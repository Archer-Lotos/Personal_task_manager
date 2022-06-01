<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateTagRequest;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;


class TagController extends Controller
{
    public function index()
    {
        return response()->success([
            'data' => Tag::where('user_id', auth()->id())->get()
        ]);
    }

    public function show($id)
    {
        $tag = Tag::where('id', $id)->with('tasks')->get();
        if ($tag->isEmpty()) return response()->error('data not found', 404);

        return response()->success(TagResource::collection($tag));
    }

    public function store(CreateTagRequest $request)
    {
        $tag = Tag::create(['user_id' => auth()->id()] + $request->validated());

        return response()->success(['data' => $tag]);
    }
}
