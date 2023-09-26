<?php

namespace App\Http\Controllers;

// use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
// use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class UserController extends Controller
{
    /**
     * Register
     */
    public function register(Request $request)
    {
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $success = true;
            $message = 'User register successfully';

        } catch(\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];
    return response()->json($response);
    }
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)){
            $success = true;
            $message = 'User login succefully';
        } else {
            $success = false;
            $message = 'Unauthorised';
        }
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
    public function logout(Request $request)
    {
        try {
            $request->session()->flush();
            $success = true;
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
}
