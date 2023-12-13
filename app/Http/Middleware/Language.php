<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('lang')) {
            $lang = session(('lang'));
        } else {
            $lang = 'uz';
        }

        $locale = $request->header('Accept-Language');
        app()->setLocale($locale);

        \App::setLocale($lang);
        return $next($request);
    }
}
