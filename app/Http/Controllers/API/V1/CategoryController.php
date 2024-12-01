<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController 
{
    // Liste des catégories avec recherche
    public function index(Request $request): JsonResponse
    {
        $query = Category::query();

        if ($request->has('search')) {
            $query->search($request->get('search'));
        }

        $categories = $query->get();

        return response()->json($categories);
    }

    // Récupérer une catégorie spécifique
    public function show(Category $category): JsonResponse
    {
        return response()->json($category);
    }

    // Ajouter une nouvelle catégorie
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
            'short_code' => 'nullable|string|max:10',
        ]);

        $category = Category::create($validated);

        return response()->json(['message' => 'Category created successfully', 'category' => $category], 201);
    }

    // Mettre à jour une catégorie
    public function update(Request $request, Category $category): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'short_code' => 'nullable|string|max:10',
        ]);

        $category->update($validated);

        return response()->json(['message' => 'Category updated successfully', 'category' => $category]);
    }

    // Supprimer une catégorie
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
