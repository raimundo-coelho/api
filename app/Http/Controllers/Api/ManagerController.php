<?php

namespace IDEALE\Http\Controllers\Api;

use Auth;
use IDEALE\Http\Resources\manager\ManagerResource;
use IDEALE\Models\Course;
use IDEALE\Models\Manager;
use IDEALE\Models\User;
use Illuminate\Http\Request;
use IDEALE\Http\Controllers\Controller;
use PDF;

class ManagerController extends Controller
{

    public function index()
    {
        $manager = Manager::all();
        return ManagerResource::collection($manager);
    }


    public function store(Request $request)
    {
        $data['course_id']  = $request->course_id;

        $manager = Manager::all()
            ->where('user_id', '=', "" . Auth::user()->id . "")
            ->where('course_id', '=', "$request->course_id")
            ->count();

        if ($manager == 0) {
            $managers = Manager::create($data);
            return new ManagerResource($managers);
        } else {
            $managers = $course_manager = Manager::all()
                ->where('user_id', '=', "" . Auth::user()->id . "")
                ->where('course_id', '=', "$request->course_id")
                ->last();
            return new ManagerResource($managers);
        }
    }

    public function show(Manager $manager)
    {
        return new ManagerResource($manager);
    }


    /**
     * @param Request $request
     * @param Manager $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $manager->fill($request->all());
        $manager->save();

        $data['user_id']    = Auth::user()->id;
        $user               = User::find(Auth::user()->id);
        $course             = Course::find($request->course_id);

        $pdf = PDF::loadview('student.pdf', compact('user', 'course'));
        return $pdf
            ->setPaper('a4', 'landscape')
            ->setWarnings(false)
            ->download($user->name . '.pdf');
    }


    public function destroy(Manager $manager)
    {
        //
    }
}
