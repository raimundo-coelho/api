<?php

namespace IDEALE\Http\Controllers\Api;

use IDEALE\Http\Requests\CourseRequest;
use IDEALE\Http\Resources\course\CourseCollection;
use IDEALE\Http\Resources\course\CourseResource;
use IDEALE\Models\Course;
use IDEALE\Http\Controllers\Controller;

class CourseController extends Controller
{

    public function index()
    {
        $courses =  Course::all();
        return new CourseCollection($courses);
    }


    public function store(CourseRequest $request)
    {
        $course = Course::create($request->all());
        return new CourseResource($course);
    }


    public function show(Course $course)
    {
        return new CourseResource($course);
    }


    public function update(CourseRequest $request, Course $course)
    {
        $course->fill($request->all());
        $course->save();
        return new CourseResource($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json([], 204);
    }
}
