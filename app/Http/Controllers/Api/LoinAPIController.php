<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoinAPIController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $data = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        $queryUser = User::where('email', $data['email'])->first();
        if(!empty($queryUser))
        {
            if(Hash::check($data['password'], $queryUser->password)) {
                $token = $queryUser->createToken($queryUser->email);
                return response()->json([
                   'message' => 'Login successfully.',
                   'data' => [
                     'token' => $token->plainTextToken
                   ]

                ]);
            }
        }

        return response()->json([
            'message' => 'Invalid Credentials',
            'data' => $data
        ]);

    }
}
