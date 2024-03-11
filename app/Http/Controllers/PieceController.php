<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;


class PieceController extends Controller
{
    public function index()
    {
        $pieces = Piece::all();
        return response()->json(['pieces' => $pieces], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:30',
            'flyer' => 'required|string|max:255',
        ]);

        $piece = Piece::create($validatedData);

        return response()->json(['piece' => $piece], 201);
    }

    public function show($id)
    {
        $piece = Piece::findOrFail($id);
        return response()->json(['piece' => $piece], 200);
    }

    public function update(Request $request, $id)
    {
        $piece = Piece::findOrFail($id);

        $validatedData = $request->validate([
            'titre' => 'required|string|max:30',
            'flyer' => 'required|string|max:255',
        ]);

        $piece->update($validatedData);

        return response()->json(['piece' => $piece], 200);
    }

    public function destroy($id)
    {
        $piece = Piece::findOrFail($id);
        $piece->delete();

        return response()->json(null, 204);
    }
}
