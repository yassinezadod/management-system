<?php

namespace App\Http\Controllers\API\V1;


use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController 
{

    // Afficher tous les clients
    public function index()
    {
        return response()->json(Customer::all());
    }

    // Afficher un client par ID
    public function show($id)
    {
        $customer = Customer::find($id);

        if ($customer) {
            return response()->json($customer);
        }

        return response()->json(['message' => 'Client non trouvé'], 404);
    }

    // Créer un nouveau client
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // Si vous gérez des photos
            'account_holder' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:20',
            'bank_name' => 'nullable|string|max:255',
        ]);

        // Enregistrer le client
        $customer = Customer::create($validated);

        return response()->json($customer, 201);
    }

    // Mettre à jour un client
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Client non trouvé'], 404);
        }

        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // Si vous gérez des photos
            'account_holder' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:20',
            'bank_name' => 'nullable|string|max:255',
        ]);

        // Mettre à jour le client
        $customer->update($validated);

        return response()->json($customer);
    }

    // Supprimer un client
    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Client non trouvé'], 404);
        }

        $customer->delete();

        return response()->json(['message' => 'Client supprimé'], 200);
    }
    
}
