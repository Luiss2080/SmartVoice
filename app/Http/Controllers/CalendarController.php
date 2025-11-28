<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('modulos.calendario.index');
    }

    public function getEvents()
    {
        $events = \App\Models\Evento::where('user_id', auth()->id())->get();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        ]);

        $evento = \App\Models\Evento::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'color' => $request->color ?? '#5d5fef',
            'user_id' => auth()->id(),
        ]);

        return response()->json($evento);
    }

    public function destroy($id)
    {
        $evento = \App\Models\Evento::where('user_id', auth()->id())->findOrFail($id);
        $evento->delete();
        return response()->json(['success' => true]);
    }
}
