<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\CreateTagRequest;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::where('user_id', auth()->id())->orderByDesc('created_at')->get();

        return view('tags', compact('tags'));
    }
    public function store(CreateTagRequest $request)
    {
        Tag::create(['user_id' => auth()->id()] + $request->validated());

        return redirect()->back()->with('message', 'Тег успешно создан!');
    }
}
