<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController 
{
     // Afficher tous les devis
     public function index()
     {
         return response()->json(Quotation::with(['customer', 'quotationDetails'])->get());
     }
 
     // Afficher un devis spécifique
     public function show($id)
     {
         $quotation = Quotation::with(['customer', 'quotationDetails'])->find($id);
 
         if ($quotation) {
             return response()->json($quotation);
         }
 
         return response()->json(['message' => 'Devis non trouvé'], 404);
     }
 
     // Créer un nouveau devis
     public function store(Request $request)
     {
         // Validation des données
         $validated = $request->validate([
             'customer_id'        => 'required|exists:customers,id',
             'customer_name'      => 'required|string',
             'tax_percentage'     => 'required|numeric',
             'tax_amount'         => 'required|numeric',
             'discount_percentage'=> 'required|numeric',
             'discount_amount'    => 'required|numeric',
             'shipping_amount'    => 'required|numeric',
             'total_amount'       => 'required|numeric',
             'status'             => 'required|string',
             'note'               => 'nullable|string',
         ]);
 
         // Créer le devis
         $quotation = Quotation::create($validated);
 
         return response()->json($quotation, 201);
     }
 
     // Mettre à jour un devis
     public function update(Request $request, $id)
     {
         $quotation = Quotation::find($id);
 
         if (!$quotation) {
             return response()->json(['message' => 'Devis non trouvé'], 404);
         }
 
         // Validation des données
         $validated = $request->validate([
             'customer_id'        => 'required|exists:customers,id',
             'customer_name'      => 'required|string',
             'tax_percentage'     => 'required|numeric',
             'tax_amount'         => 'required|numeric',
             'discount_percentage'=> 'required|numeric',
             'discount_amount'    => 'required|numeric',
             'shipping_amount'    => 'required|numeric',
             'total_amount'       => 'required|numeric',
             'status'             => 'required|string',
             'note'               => 'nullable|string',
         ]);
 
         // Mettre à jour le devis
         $quotation->update($validated);
 
         return response()->json($quotation);
     }
 
     // Supprimer un devis
     public function destroy($id)
     {
         $quotation = Quotation::find($id);
 
         if (!$quotation) {
             return response()->json(['message' => 'Devis non trouvé'], 404);
         }
 
         $quotation->delete();
 
         return response()->json(['message' => 'Devis supprimé'], 200);
     }
}
