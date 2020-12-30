<?php

namespace App\Http\Controllers\Api\Auth;

use App\Api\ApiMessages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginJwtController extends Controller
{
     /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    { 
        $credentials = $request->all('email', 'password');

        //o helper auth traz por default uma instancia do guard web no entanto
        //peço para trazer api, o attempt tenta logar e se conseguir traz o token
        if (! $token = auth('api')->attempt($credentials)) {
           
            $message = new ApiMessages('Unauthorized');

            return response()->json($message->getMessage(), 401);
        }

        return response()->json([
           'token' => $token   
        ]);
    }

}
