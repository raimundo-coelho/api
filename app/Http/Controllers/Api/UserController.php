<?php

namespace IDEALE\Http\Controllers\Api;

use IDEALE\Http\Requests\UserRequest;
use IDEALE\Http\Resources\user\UserResource;
use IDEALE\Models\User;

use Illuminate\Http\Request;
use IDEALE\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all());
        $user->save();

        return new UserResource($user);
    }

}
