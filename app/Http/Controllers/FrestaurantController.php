<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrestaurantController extends Controller
{
    public function index()
    {
        // Logique pour la page Find Restaurant
        return view('find-restaurant');
    }
}
