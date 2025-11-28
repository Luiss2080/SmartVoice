<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        return redirect()->route('configuracion.general');
    }

    public function general()
    {
        $configuraciones = \App\Models\Configuracion::all()->pluck('valor', 'clave');
        return view('modulos.configuracion.general', compact('configuraciones'));
    }

    public function reproduccion()
    {
        $configuraciones = \App\Models\Configuracion::all()->pluck('valor', 'clave');
        return view('modulos.configuracion.reproduccion', compact('configuraciones'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $clave => $valor) {
            \App\Models\Configuracion::updateOrCreate(
                ['clave' => $clave],
                ['valor' => $valor]
            );
        }

        return back()->with('success', 'Configuración actualizada exitosamente.');
    }
}
