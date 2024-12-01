<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController 
{
    // Afficher tous les utilisateurs
    public function index()
    {
        return response()->json(User::all());
    }

    // Afficher un utilisateur par username
    public function show($username)
    {
        $user = User::where('username', $username)->first();

        if ($user) {
            return response()->json($user);
        }

        return response()->json(['message' => 'Utilisateur non trouvé'], 404);
    }

    // Créer un nouvel utilisateur
    public function store(Request $request)
    {
        // Validation des données d'entrée
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        // Hash du mot de passe avant de l'enregistrer
        $validated['password'] = Hash::make($request->password);

        // Enregistrement de l'utilisateur
        $user = User::create($validated->validated());

        return response()->json($user, 201);
    }

    // Mettre à jour un utilisateur
    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        // Validation des données d'entrée
        $validated = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        // Mise à jour des données
        if ($request->has('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated->validated());

        return response()->json($user);
    }

    // Supprimer un utilisateur
    public function destroy($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé'], 200);
    }
}
