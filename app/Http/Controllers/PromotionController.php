<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        // Logique pour afficher le tableau de bord
        return view('promotions');
    }
}
