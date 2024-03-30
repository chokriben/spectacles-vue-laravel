<?php

// app/Http/Controllers/PizzaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    // Afficher toutes les pizzas
    public function index()
    {
        $pizzas = Pizza::all();
        return response()->json($pizzas);
    }

    // Enregistrer une nouvelle pizza
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'details' => 'required|string',
            'prix' => 'required|numeric',
            'qtestock' => 'required|integer',
        ]);

        $pizza = Pizza::create($request->all());
        return response()->json($pizza, 201);
    }

    // Afficher une pizza spécifique
    public function show($id)
    {
        $pizza = Pizza::findOrFail($id);
        return response()->json($pizza);
    }

    // Mettre à jour une pizza
    public function update(Request $request, $id)
    {
        $pizza = Pizza::findOrFail($id);

        $request->validate([
            'nom' => 'string',
            'details' => 'string',
            'prix' => 'numeric',
            'qtestock' => 'required|integer',
        ]);

        $pizza->update($request->all());
        return response()->json($pizza, 200);
    }

    // Supprimer une pizza
    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return response()->json(null, 204);
    }
}
