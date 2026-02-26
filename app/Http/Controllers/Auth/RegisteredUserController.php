<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
            'password' => Hash::make($request->string('password')),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.index');
        }

        if ($user->isClient()) {
            return redirect()->route('client.index');
        }

        return redirect()->route('candidate.index');
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