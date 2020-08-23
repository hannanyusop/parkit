<?php

namespace App\Http\Middleware;

use Closure;

class checkLibSelfLogin
{

    public function handle($request, Closure $next)
    {

        if(\Session::has('self-login')){

            return redirect()->route('frontend.user.library.visitor.self')->withFlashWarning('Pemintaan tidak debenarkan!');


        }else{
            return $next($request);
        }
    }
}
