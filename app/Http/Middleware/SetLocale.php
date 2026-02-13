<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // 1 Si langue en session
        if (session()->has('lang')) {
            App::setLocale(session('lang'));
        }
        // Si utilisateur connecté
        else if (auth()->check()) {

            $userLang = auth()->user()->langue ?? 'fr';

            App::setLocale($userLang);

            session(['lang' => $userLang]);
        }
        // Sinon langue par défaut
        else {
            App::setLocale('fr');
        }

        return $next($request);
    }
}
