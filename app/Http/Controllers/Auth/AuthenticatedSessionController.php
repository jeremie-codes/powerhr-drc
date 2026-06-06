<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
    */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        session()->regenerate();

        $user = Auth::user();

        dd(App::getLocale());

        if ($user->isAdmin()) {
            return redirect()->route('admin.index', ['locale' => App::getLocale()]);
        }

        if ($user->isClient()) {
            return redirect()->route('client.index', ['locale' => App::getLocale()]);
        }

        return redirect()->route('candidate.index', ['locale' => App::getLocale()]);
    }


    /**
     * Destroy an authenticated session.
    */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->forget('lang');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        App::setLocale('fr');

        return redirect()->route('index', ['locale' => app()->getLocale()]);
    }
}
