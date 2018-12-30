<?php

namespace IDEALE\Http\Controllers\Api;

use http\Exception;
use IDEALE\Http\Requests\UserRequest;
use IDEALE\Http\Resources\user\UserResource;
use IDEALE\Models\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use IDEALE\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        return new UserResource($user);
    }

    public function update(Request $request)
    {
       // $request->id = null;

        try {
            $valid = validator($request->only('old_password', 'new_password', 'password_confirmation'), [
                'old_password' => 'required|string|min:6',
                'new_password' => 'required|string|min:6|different:old_password',
                'password_confirmation' => 'required_with:new_password|same:new_password|string|min:6',
            ], [
                'password_confirmation.required_with' => 'Confirmação da senha é necessária.'
            ]);

            if ($valid->fails()) {
                return response()->json([
                    'errors' => $valid->errors(),
                    'message' => 'Falha ao atualizar senha.',
                    'status' => false
                ], 200);
            }

            if (Hash::check($request->get('old_password'), Auth::user()->password)) {
                $user = User::find(Auth::user()->id);
                $user->password = (new BcryptHasher)->make($request->get('new_password'));

                if ($user->save()) {
                    return response()->json([
                        'data' => [],
                        'message' => 'Sua senha foi atualizada com sucesso',
                        'status' => true
                    ], 200);
                }
            } else {
                return response()->json([
                    'errors' => [],
                    'message' => 'Senha atual digitada esta incorreta.',
                    'status' => false
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'errors' => $e->getMessage(),
                'message' => 'Por favor, tente novamente',
                'status' => false
            ], 200);
        }
    }
}
