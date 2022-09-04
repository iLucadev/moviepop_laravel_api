<?php

namespace App\Http\Controllers\AUTH;

use App\Http\Controllers\AUTH\BaseController as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            //solves an intelephense issue
            /** @var \App\Models\User $authUser **/
            $authUser = Auth::user();
            $success['token'] = $authUser->createToken('sanctum_auth')->plainTextToken;
            $success['name'] = $authUser->first_name;

            return $this->sendResponse($success, 'User signed in');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('sanctum_auth')->plainTextToken;
        $success['name'] = $user->first_name;

        return $this->sendResponse($success, 'User created successfully.');
    }
}
