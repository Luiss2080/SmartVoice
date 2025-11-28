<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        // Assuming Campana model exists, if not I will use DB facade or create it.
        // Checking if model exists first would be ideal, but I'll assume standard Laravel convention.
        // If Model doesn't exist, I'll need to create it.
        // Let's check if models exist first.
        return view('modulos.campanas.index');
    }
}
