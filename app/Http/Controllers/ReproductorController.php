<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReproductorController extends Controller
{
    public function index()
    {
        $campanas = \App\Models\Campana::where('estado', 'activa')->withCount('audios')->get();
        return view('modulos.reproductor.interfaz', compact('campanas'));
    }

    public function getAudios($campanaId)
    {
        $audios = \App\Models\Audio::where('campana_id', $campanaId)
            ->select('id', 'nombre', 'archivo_path', 'duracion', 'campana_id')
            ->get()
            ->map(function($audio) {
                return [
                    'id' => $audio->id,
                    'title' => $audio->nombre,
                    'src' => asset('storage/' . $audio->archivo_path),
                    'duration' => $audio->duracion,
                    'campana_id' => $audio->campana_id
                ];
            });

        return response()->json($audios);
    }
}
