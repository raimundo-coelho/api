<?php

namespace IDEALE\Http\Controllers\Api;

use IDEALE\Http\Requests\UserRequest;
use IDEALE\Http\Resources\user\UserCollection;
use IDEALE\Http\Resources\user\UserResource;
use IDEALE\Models\User;
use IDEALE\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function index()
    {
        $users =  User::all();
        return new UserCollection($users);
    }

    public function store(UserRequest $request)
    {
        $data               =   $request->all();
        $data['password']   =   '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';

        $user = User::create($data);
        return new UserResource($user);
    }


    public function show(User $user)
    {
        return new UserResource($user);
    }


    public function update(UserRequest $request, User $user)
    {

        $data   =   $request->all();

        if($data['password'] != null)
            $data['password'] = bcrypt($data['password']);
        else
            $data['password'] = \Auth::user()->getAuthPassword();


        $user->fill($data);
        $user->save();
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([], 204);
    }
}
