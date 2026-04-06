<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    // Users can only view movements (read-only)
    public function index()
    {
        $movements = Movement::all();
        return view('user.movements.library', ['movements' => $movements]);
    }

    public function show($id)
    {
        $movement = Movement::findOrFail($id);
        return view('user.movements.show', ['movement' => $movement]);
    }
}
