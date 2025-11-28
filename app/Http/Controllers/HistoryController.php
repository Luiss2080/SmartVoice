<?php

namespace App\Http\Controllers;

use App\Models\HistorialReproduccion;

class HistoryController extends Controller
{
    public function index()
    {
        $historial = HistorialReproduccion::all();
        return view('modulos.historial.index', compact('historial'));
    }
}
