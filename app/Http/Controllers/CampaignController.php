<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Campana;

class CampaignController extends Controller
{
    public function index()
    {
        $campanas = Campana::all();
        return view('modulos.campanas.index', compact('campanas'));
    }
}
