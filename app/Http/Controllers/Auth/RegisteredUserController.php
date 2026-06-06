<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Mail\VerifieEmail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string', 'max:55'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $otp = rand(100000, 999999);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role'  => $request->role,
                'password' => Hash::make($request->string('password')),
                'otp' => $otp
            ]);

            event(new Registered($user));

            $token = sha1($validated['email'] . now());
            session(['two_factor_auth' => $token, 'email' => $validated['email']]);
            Mail::to($validated['email'])->send(new VerifieEmail($validated, $otp));

            return redirect()->route('two-factor.login', ['token' => $token]);
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi de l\'email de vérification: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de l\'envoi de l\'email: ' . $e->getMessage());
        }

    }

    // Confirmation de l'otp et conection de l'utilisateur
    public function confirm(Request $request) {
        if (is_array($request->otp)) {
            $otp = implode('', $request->otp);
        } else {
            $otp = $request->otp;
        }

        if (!$otp) {
            Log::error('Tentative de connexion sans OTP pour l\'email: ' . $request->email);
            return redirect()->route('login.view', ['locale' => App::getLocale()])->with('error', 'OTP invalide. Veuillez réessayer.');
        }

        $email = $request->email;
        if (!$email) {
            Log::error('Tentative de connexion sans email pour l\'OTP: ' . $otp);
            return redirect()->route('login.view', ['locale' => App::getLocale()])->with('error', 'Email invalide. Veuillez réessayer.');
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            Log::error('Aucun utilisateur trouvé pour l\'email: ' . $email);
            return redirect()->route('login.view', ['locale' => App::getLocale()])->with('error', 'Utilisateur non trouvé. Veuillez réessayer.');
        }

        if ($user->otp == $otp) {
            Auth::login($user);
            $user->otp = null;
            $user->save();

            session()->forget(['two_factor_auth', 'email']);

            if ($user->isAdmin()) {
                return redirect()->route('admin.index');
            }

            if ($user->isClient()) {
                return redirect()->route('client.index');
            }

            return redirect()->route('candidate.index', ['locale' => app()->getLocale()]);
        } else {
            return redirect()->route('login.view', ['locale' => App::getLocale()])->with('error', 'OTP invalide. Veuillez réessayer.');
        }
    }

    // resend otp
    public function resend(Request $request) {
        try {
            $validated = $request->validate([
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'exists:users,email'],
            ]);

            $user = User::where('email', $validated['email'])->first();

            $otp = rand(100000, 999999);

            // 4. On met à jour l'utilisateur (updated_at se met à jour seul avec save())
            $user->otp = $otp;
            $user->save();

            // 5. Gestion du token de session
            $token = session('two_factor_auth') ?: sha1($validated['email'] . now());
            session(['two_factor_auth' => $token, 'email' => $validated['email']]);

            // 6. Envoi du mail
            Mail::to($validated['email'])->send(new VerifieEmail($user, $otp));

            return redirect()->route('two-factor.login', ['token' => $token])
                            ->with('success', 'Un nouveau code a été envoyé.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Retourne les erreurs de validation spécifiques (ex: email non trouvé)
            return redirect()->back()->withErrors($e->validator)->withInput();

        } catch (\Exception $e) {
            Log::error('Erreur lors du renvoi OTP: ' . $e->getMessage());
            return redirect()->route('login.view', ['locale' => App::getLocale()])->with('error', 'Une erreur est survenue, réessayez plus tard.');
        }
    }

    public function index(Request $request) {
       try {
            $users = User::all();

            return response()->json([
                "success" => true,
                "message" => "Les utilisateurs sont récuperés avec succès !",
                "data" => $users
            ]);
       } catch (\Throwable $th) {
           return response()->json([
               "success" => false,
               "message" => "Une erreur est survenue lors de la recuperation des utilisateurs !",
               "data" => $th
           ]);
       }
    }
}
