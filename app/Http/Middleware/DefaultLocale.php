<?php

namespace App\Http\Middleware;

use Closure, Session;

class DefaultLocale
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

        if (!Session::has('locale')) {
            if(\Auth::check())
            {
                $_SESSION['locale'] = \Auth::user()->lang;
                Session::put('locale',\Auth::user()->lang);
            }else{
                $_SESSION['locale'] = 'en';
                Session::put('locale','en');
            }


        }else{
            $_SESSION['locale'] = request()->segment(1);
            Session::put( 'locale',request()->segment(1) );
        }

        app()->setLocale(Session::get('locale'));

        return $next($request);


    }
}
