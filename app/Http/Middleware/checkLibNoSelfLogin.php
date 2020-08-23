<?php

namespace App\Http\Middleware;

use Closure;

class checkLibNoSelfLogin
{

    public function handle($request, Closure $next)
    {

        if(\Session::has('self-login')){

            return $next($request);

        }else{
            return redirect()->route('frontend.user.library.visitor.today')->withFlashWarning('Sila aktifkan mod SELF-LOGIN terlebih dahulu.');

        }
    }
}
