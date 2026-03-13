<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $profiles = User::where('role', 'admin')->where('id', '!=', auth()->id())->paginate(10);

        return view('admin.users.index', compact('profiles'));
    }

    public function create(User $user = null) {
        $countries = Country::all();
        return view('admin.users.create', compact('user', 'countries'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id'         => 'nullable|exists:users,id',
                'name'            => 'required|string|max:255',
                'email'           => 'required|email|max:255',
                'pays_residence'  => 'required|exists:countries,id',
                'langue'          => 'required|string|max:5',
                'phone'           => 'nullable|string|max:20',
                'gender'          => 'required|string|max:10',
                'avatar'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'password'        => 'nullable|string|min:8|confirmed',
            ]);

            // Déterminer si c'est un update ou create
            $user = User::find($validated['user_id']) ?? new User();

            /* Upload avatar */
            if ($request->hasFile('avatar')) {

                if ($user->image && Storage::disk('public')->exists($user->image)) {
                    Storage::disk('public')->delete($user->image);
                }

                $validated['image'] = $request
                    ->file('avatar')
                    ->store('avatars', 'public');
            }

            /* Mise à jour des données */
            $user->name       = $validated['name'];
            $user->email      = $validated['email'];
            $user->phone      = $validated['phone'];
            $user->role      = "admin";
            $user->gender     = $validated['gender'];
            $user->langue     = $validated['langue'];
            $user->country_id = $validated['pays_residence'];

            if(isset($validated['image'])){
                $user->image = $validated['image'];
            }

            // Mettre à jour le mot de passe seulement si rempli
            if (!empty($validated['password'])) {
                $user->password = bcrypt($validated['password']);
            }

            $user->save();

            $message = $request->user_id
                ? 'Utilisateur mis à jour avec succès'
                : 'Utilisateur créé avec succès';

            return redirect()
                ->route('admin.users.index')
                ->with('success', $message);

        } catch (\Throwable $th) {

            \Log::error('Erreur user : '.$th->getMessage());

            return back()->with('error', 'Une erreur est survenue');
        }
    }

    public function update(Request $request, User $user) {
        try {
            $user->update([
                'is_active' => $request->is_active,
            ]);

            return redirect()->back()->with('success', 'Status mis à jour avec succès !');
        } catch (\Throwable $th) {

            \Log::error('Erreur lors de changement de status' . $th);
            return redirect()->back()->with('error', 'Une erreur est survenue.');
        }
    }

    public function destroy(User $user) {
        try {
            $user->delete();
            return redirect()->back()->with('success', 'Utilisateur supprimé avec succès !');
        } catch (\Throwable $th) {
            \Log::error('Erreur lors de la suppression ' . $th);
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
