<?php

namespace App\Http\Middleware;

use Closure;

class ChangeLanguage
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

        //set default language to be arabic
        app()->setLocale('ar');

        //switch anguage to english
        if (isset($request->language) && $request->language == 'en')
        {
            app()->setLocale('en');
        }

        return $next($request);
    }
}
