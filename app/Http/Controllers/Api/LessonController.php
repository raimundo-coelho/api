<?php

namespace IDEALE\Http\Controllers\Api;

use IDEALE\Http\Requests\LessonRequest;
use IDEALE\Http\Resources\lesson\LessonCollection;
use IDEALE\Http\Resources\lesson\LessonResource;
use IDEALE\Models\Lesson;
use IDEALE\Http\Controllers\Controller;

class LessonController extends Controller
{

    public function index()
    {
        $lessons =  Lesson::all();
        return new LessonCollection($lessons);
    }


    public function store(LessonRequest $request)
    {
        $lesson = Lesson::create($request->all());
        return new LessonResource($lesson);
    }


    public function show(Lesson $lesson)
    {
        return new LessonResource($lesson);
    }


    public function update(LessonRequest $request, Lesson $lesson)
    {
        $lesson->fill($request->all());
        $lesson->save();
        return new LessonResource($lesson);
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return response()->json([], 204);
    }
}
