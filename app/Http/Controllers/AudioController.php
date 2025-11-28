<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Audio;

class AudioController extends Controller
{
    public function index()
    {
        $audios = Audio::all();
        return view('modulos.audios.index', compact('audios'));
    }
}
