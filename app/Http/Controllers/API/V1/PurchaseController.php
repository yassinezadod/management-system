<?php

namespace App\Http\Controllers\API\V1;


use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController 
{
    // Afficher tous les achats
    public function index()
    {
        return response()->json(Purchase::with(['supplier', 'createdBy', 'updatedBy', 'details'])->get());
    }

    // Afficher un achat spécifique
    public function show($id)
    {
        $purchase = Purchase::with(['supplier', 'createdBy', 'updatedBy', 'details'])->find($id);

        if ($purchase) {
            return response()->json($purchase);
        }

        return response()->json(['message' => 'Achat non trouvé'], 404);
    }

    // Créer un nouvel achat
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'supplier_id'   => 'required|exists:suppliers,id',
            'date'           => 'required|date',
            'purchase_no'    => 'required|string|unique:purchases,purchase_no',
            'status'         => 'required|string',
            'total_amount'   => 'required|numeric',
            'created_by'     => 'required|exists:users,id',
            'updated_by'     => 'nullable|exists:users,id',
        ]);

        // Créer l'achat
        $purchase = Purchase::create($validated);

        return response()->json($purchase, 201);
    }

    // Mettre à jour un achat
    public function update(Request $request, $id)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json(['message' => 'Achat non trouvé'], 404);
        }

        // Validation des données
        $validated = $request->validate([
            'supplier_id'   => 'required|exists:suppliers,id',
            'date'           => 'required|date',
            'purchase_no'    => 'required|string|unique:purchases,purchase_no,' . $id,
            'status'         => 'required|string',
            'total_amount'   => 'required|numeric',
            'created_by'     => 'required|exists:users,id',
            'updated_by'     => 'nullable|exists:users,id',
        ]);

        // Mettre à jour l'achat
        $purchase->update($validated);

        return response()->json($purchase);
    }

    // Supprimer un achat
    public function destroy($id)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json(['message' => 'Achat non trouvé'], 404);
        }

        $purchase->delete();

        return response()->json(['message' => 'Achat supprimé'], 200);
    }

}
