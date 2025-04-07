<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        // Logique pour la page Location
        return view('location');
    }
}
