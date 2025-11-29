<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Configuracion;

class SettingsController extends Controller
{
    public function index()
    {
        $configuraciones = Configuracion::pluck('valor', 'clave')->toArray();
        return view('modulos.configuracion.index', compact('configuraciones'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            Configuracion::updateOrCreate(
                ['clave' => $key],
                ['valor' => $value]
            );
        }

        // Handle checkboxes that might be unchecked (and thus not sent)
        // specifically for 'autoplay' and 'loop' if they are not in the request but were expected
        // However, the view uses hidden inputs for '0' values, so $request->all() should catch them.
        // But let's be safe and ensure we handle the specific boolean flags if needed.
        // The view has: <input type="hidden" name="autoplay" value="0"> <input type="checkbox" ... value="1">
        // So $data will contain 'autoplay' => '1' or '0'. This is fine.

        return redirect()->route('configuracion.index')->with('success', 'Configuración actualizada correctamente.');
    }
}
