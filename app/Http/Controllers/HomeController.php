<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalCampanas = \App\Models\Campana::count();
        $totalAudios = \App\Models\Audio::count();
        $totalUsuarios = \App\Models\User::count();
        
        $recentCampanas = \App\Models\Campana::latest()->take(5)->get();
        $recentAudios = \App\Models\Audio::with('campana')->latest()->take(5)->get();

        return view('dashboard', compact('totalCampanas', 'totalAudios', 'totalUsuarios', 'recentCampanas', 'recentAudios'));
    }
}
