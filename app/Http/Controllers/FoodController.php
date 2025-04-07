<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        // Logique pour la page Find Food
        return view('find-food');
    }
}
