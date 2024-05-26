<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $data = $request->validate([
            "name"=>["required","string"],
            "email"=> ["required","email","unique:users"],
            "password"=> ["required", "min:8"],
        ]);

        $user = User::create($data);

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            "user" => $user,
            "token" => $token
        ];
         
    }
    public function login(Request $request){

        $data = $request->validate([
            "email"=> ["required","email","exists:users,email"],
            "password"=> ["required", "min:8"],
        ]);

        $user = User::where('email', $data["email"])->first();

        //avlidate and check password and email(user)

        if(!$user || !Hash::check($data["password"], $user->password)){
            return response([
                'message' => "incorrect username or password"
            ], 401);
        } 

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            "user" => $user,
            "token" => $token
        ];         

    }
}
