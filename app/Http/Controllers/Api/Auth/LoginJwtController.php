<?php

namespace App\Http\Controllers\Api\Auth;

use App\Api\ApiMessages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;


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

      Validator::make($credentials, [
         'email'    => 'required|string',
         'password' => 'required|string'
      ])->validate();

      //o helper auth traz por default uma instancia do guard web no entanto
      //peço para trazer api, o attempt tenta logar e se conseguir traz o token
      if (!$token = auth('api')->attempt($credentials)) {

         $message = new ApiMessages('Unauthorized');

         return response()->json($message->getMessage(), 401);
      }

      return response()->json([
         'token' => $token
      ]);
   }

   //faz o logout do token, deixando ele cair em blacklist
   public function logout()
   {
      auth('api')->logout();

      return response()->json([
         'message' => 'logout successfully'
      ], 200);
   }


   public function refresh()
   {
      $token = auth('api')->refresh();

      return response()->json([
         'token' => $token
      ]);
   }
}
