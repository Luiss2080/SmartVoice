<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampanaController extends Controller
{
    public function index()
    {
        $campanas = \App\Models\Campana::withCount('audios')->latest()->get();
        return view('modulos.campanas.index', compact('campanas'));
    }

    public function create()
    {
        return view('modulos.campanas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        \App\Models\Campana::create($request->all());

        return redirect()->route('campanas.index')->with('success', 'Campaña creada exitosamente.');
    }

    public function show($id)
    {
        $campana = \App\Models\Campana::with('audios')->findOrFail($id);
        return view('modulos.campanas.show', compact('campana'));
    }

    public function edit($id)
    {
        $campana = \App\Models\Campana::findOrFail($id);
        return view('modulos.campanas.edit', compact('campana'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|in:activo,inactivo,borrador',
        ]);

        $campana = \App\Models\Campana::findOrFail($id);
        $campana->update($request->all());

        return redirect()->route('campanas.index')->with('success', 'Campaña actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $campana = \App\Models\Campana::findOrFail($id);
        $campana->delete();

        return redirect()->route('campanas.index')->with('success', 'Campaña eliminada exitosamente.');
    }

    public function uploadAudio(Request $request, $id)
    {
        $request->validate([
            'audio' => 'required|file|mimes:mp3,wav,ogg,opus|max:10240', // 10MB max
            'nombre' => 'required|string|max:255',
        ]);

        $campana = \App\Models\Campana::findOrFail($id);

        if ($request->hasFile('audio')) {
            $file = $request->file('audio');
            $path = $file->store('audios', 'public');

            $campana->audios()->create([
                'nombre' => $request->nombre,
                'archivo_path' => $path,
                'duracion' => '00:00', // Placeholder, would need a library to get real duration
                'tamano' => number_format($file->getSize() / 1024, 2) . ' KB',
                'formato' => $file->getClientOriginalExtension(),
            ]);
        }

        return redirect()->route('campanas.show', $id)->with('success', 'Audio subido exitosamente.');
    }
}
