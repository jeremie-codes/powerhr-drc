<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest')
->name('register.view');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')
->name('login.view');

Route::get('/register/two-factor/auth/{token}', function ($token) {
    $email = session('email');
    $tokenSession = session('two_factor_auth');
    $user = User::where('email', $email)->first();

    if ($token != $tokenSession || !$email) {
        return redirect()->route('login.view')->with('error', 'Token de vérification invalide. Veuillez réessayer.');
    }

    $otpIsValid = $user->otpIsValid();
    return view('auth.two-factor', compact('email', 'token', 'otpIsValid'));
})->middleware('guest')
->name('two-factor.login');

Route::post('/register/two-factor/auth/{token}', [RegisteredUserController::class, 'confirm'])->name('two-factor.auth');

Route::post('resend-two-factor-auth', [RegisteredUserController::class, 'resend'])->middleware('guest')->name('two-factor.resend');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');

Route::put('/password', [NewPasswordController::class, 'update'])
    ->middleware('auth')
    ->name('password.update');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('guest')
    ->name('verification.send');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
