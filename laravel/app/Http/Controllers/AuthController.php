<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        try {

            $name = $request->name;
            $email = $request->email;
            $password = $request->password;

            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();
            return response()->json([
                "message" => " User registered successfully"
            ], 201);
        } catch (Exception $e) {
            //throw $th;

        }
        return response()->json([
            "message" => "user registered failed",
            'error' => $e->getMessage(),
        ], 0);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
        $user = Auth::user(); // get user from database
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successfully',
            'token' => $token,
            'user' => $user,
        ]);
    }
}
