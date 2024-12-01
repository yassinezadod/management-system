<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController 
{
    // Afficher tous les fournisseurs
    public function index()
    {
        return response()->json(Supplier::all());
    }

    // Afficher un fournisseur par ID
    public function show($id)
    {
        $supplier = Supplier::find($id);

        if ($supplier) {
            return response()->json($supplier);
        }

        return response()->json(['message' => 'Fournisseur non trouvé'], 404);
    }

    // Créer un nouveau fournisseur
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'shopname' => 'nullable|string|max:255',
            'type' => 'required|string',
            'photo' => 'nullable|image|max:2048',
            'account_holder' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:20',
            'bank_name' => 'nullable|string|max:255',
        ]);

        // Enregistrer le fournisseur
        $supplier = Supplier::create($validated);

        return response()->json($supplier, 201);
    }

    // Mettre à jour un fournisseur
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Fournisseur non trouvé'], 404);
        }

        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'shopname' => 'nullable|string|max:255',
            'type' => 'required|string',
            'photo' => 'nullable|image|max:2048',
            'account_holder' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:20',
            'bank_name' => 'nullable|string|max:255',
        ]);

        // Mettre à jour le fournisseur
        $supplier->update($validated);

        return response()->json($supplier);
    }

    // Supprimer un fournisseur
    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Fournisseur non trouvé'], 404);
        }

        $supplier->delete();

        return response()->json(['message' => 'Fournisseur supprimé'], 200);
    }
}
