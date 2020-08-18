<?php

namespace App\Http\Middleware;

use Closure;

class checkPrefects
{

    public function handle($request, Closure $next)
    {
        if(auth()->user()->can('lib_prefects')){

            if(\Session::has('prefects')){
                dd("dah");

            }else{
                return redirect()->route('frontend.user.library.prefect-login')->withFlashInfo('Sila masukan nombor kad pengenalan bertugas!');
            }
        }

        return $next($request);
    }
}
