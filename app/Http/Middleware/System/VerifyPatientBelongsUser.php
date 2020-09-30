<?php

namespace App\Http\Middleware\System;

use Closure;

class VerifyPatientBelongsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $user = $response->original->patient->user_id;

        if($user != auth()->user()->id){
          
            flash('Usuário sem permissão para acessar este paciente!')->error();

            return redirect(route('system.patients.index'));
            
        }
        
        return $response;

    }
}
