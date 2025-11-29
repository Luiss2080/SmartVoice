<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audio;
use App\Models\Campana;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    public function index(Request $request)
    {
        $query = Audio::with('campana');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nombre', 'like', "%{$search}%")
                  ->orWhere('descripcion', 'like', "%{$search}%");
        }

        if ($request->has('campana_id') && $request->campana_id != '') {
            $query->where('campana_id', $request->campana_id);
        }

        $audios = $query->latest()->paginate(10)->withQueryString();
        $campanas = Campana::all();

        return view('modulos.audios.index', compact('audios', 'campanas'));
    }

    public function create()
    {
        $campanas = Campana::all();
        return view('modulos.audios.create', compact('campanas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'campana_id' => 'required|exists:campanas,id',
            'audio_file' => 'required|file|mimes:mp3,wav,m4a,ogg,opus|max:20480', // 20MB
            'descripcion' => 'nullable|string',
        ]);

        if ($request->hasFile('audio_file')) {
            $file = $request->file('audio_file');
            $path = $file->store('audios', 'public');
            
            // Get file info
            $size = $file->getSize(); // in bytes
            $extension = $file->getClientOriginalExtension();
            
            // Format size
            if ($size >= 1048576) {
                $sizeFormatted = number_format($size / 1048576, 2) . ' MB';
            } else {
                $sizeFormatted = number_format($size / 1024, 2) . ' KB';
            }

            Audio::create([
                'nombre' => $request->nombre,
                'campana_id' => $request->campana_id,
                'descripcion' => $request->descripcion,
                'archivo_path' => $path,
                'tamano' => $sizeFormatted,
                'formato' => $extension,
                'duracion' => '00:00', // Placeholder
            ]);

            return redirect()->route('audios.index')->with('success', 'Audio subido exitosamente.');
        }

        return back()->with('error', 'Error al subir el archivo.');
    }

    public function edit($id)
    {
        $audio = Audio::findOrFail($id);
        $campanas = Campana::all();
        return view('modulos.audios.edit', compact('audio', 'campanas'));
    }

    public function update(Request $request, $id)
    {
        $audio = Audio::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'campana_id' => 'required|exists:campanas,id',
            'descripcion' => 'nullable|string',
            'audio_file' => 'nullable|file|mimes:mp3,wav,m4a,ogg,opus|max:20480',
        ]);

        $data = [
            'nombre' => $request->nombre,
            'campana_id' => $request->campana_id,
            'descripcion' => $request->descripcion,
        ];

        if ($request->hasFile('audio_file')) {
            // Delete old file
            if ($audio->archivo_path && Storage::disk('public')->exists($audio->archivo_path)) {
                Storage::disk('public')->delete($audio->archivo_path);
            }

            $file = $request->file('audio_file');
            $path = $file->store('audios', 'public');
            
            $size = $file->getSize();
            $extension = $file->getClientOriginalExtension();
            
            if ($size >= 1048576) {
                $sizeFormatted = number_format($size / 1048576, 2) . ' MB';
            } else {
                $sizeFormatted = number_format($size / 1024, 2) . ' KB';
            }

            $data['archivo_path'] = $path;
            $data['tamano'] = $sizeFormatted;
            $data['formato'] = $extension;
        }

        $audio->update($data);

        return redirect()->route('audios.index')->with('success', 'Audio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $audio = Audio::findOrFail($id);
        
        if ($audio->archivo_path && Storage::disk('public')->exists($audio->archivo_path)) {
            Storage::disk('public')->delete($audio->archivo_path);
        }
        
        $audio->delete();

        return redirect()->route('audios.index')->with('success', 'Audio eliminado exitosamente.');
    }
}
