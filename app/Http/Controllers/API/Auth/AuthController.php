<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{




    public $successStatus = 200;
    public $unauthorisedStatus = 401;

    // Login through API
    public function login()
    {

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken($user->name)->plainTextToken;
            return response()->json([
                'success' => $success,
                'user' => $user
            ], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], $this->unauthorisedStatus);
        }
    }
    

    // this method signs out users by removing tokens
    public function signout(Request $request)
    {
       // Get user who requested the logout
        $user = request()->user(); //or Auth::user()
        // Revoke current user token
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return response()->json(['success' => 'Logged Out and Token Removed.'], $this->successStatus);

    }



    // User details
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
