<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\ZoneLivraisonController;
use App\Http\Controllers\ParametreController;

use App\Http\Controllers\FoodController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\FrestaurantController;

use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

// Authentication Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Service routes
Route::get('/service', [ServiceController::class, 'index'])->name('service');

// Shop routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

// // Dashboard
// Route::get('/dashboardm', [DashboardController::class, 'index'])->name('dashboardm');



// Dashboard
Route::get('/dashboardm', [DashboardController::class, 'index'])->name('dashboardm');

// Restaurants
Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
Route::post('/restaurants', [RestaurantController::class, 'store'])->name('restaurants.store');
Route::get('/restaurants/{restaurants}', [RestaurantController::class, 'show'])->name('restaurants.show');
Route::get('/restaurants/{restaurants}/edit', [RestaurantController::class, 'edit'])->name('restaurants.edit');
Route::put('/restaurants/{restaurants}', [RestaurantController::class, 'update'])->name('restaurants.update');
Route::delete('/restaurants/{restaurants}', [RestaurantController::class, 'destroy'])->name('restaurants.destroy');

// Plats
Route::get('/plats', [PlatController::class, 'index'])->name('plats.index');
Route::get('/plats/create', [PlatController::class, 'create'])->name('plats.create');
Route::post('/plats', [PlatController::class, 'store'])->name('plats.store');
Route::get('/plats/{plat}', [PlatController::class, 'show'])->name('plats.show');
Route::get('/plats/{plat}/edit', [PlatController::class, 'edit'])->name('plats.edit');
Route::put('/plats/{plat}', [PlatController::class, 'update'])->name('plats.update');
Route::delete('/plats/{plat}', [PlatController::class, 'destroy'])->name('plats.destroy');

// Commandes
Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes.create');
Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');
Route::get('/commandes/{commande}', [CommandeController::class, 'show'])->name('commandes.show');
Route::get('/commandes/{commande}/edit', [CommandeController::class, 'edit'])->name('commandes.edit');
Route::put('/commandes/{commande}', [CommandeController::class, 'update'])->name('commandes.update');
Route::delete('/commandes/{commande}', [CommandeController::class, 'destroy'])->name('commandes.destroy');

// Utilisateurs
Route::get('/utilisateurs', [UtilisateurController::class, 'index'])->name('utilisateurs.index');
Route::get('/utilisateurs/create', [UtilisateurController::class, 'create'])->name('utilisateurs.create');
Route::post('/utilisateurs', [UtilisateurController::class, 'store'])->name('utilisateurs.store');
Route::get('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'show'])->name('utilisateurs.show');
Route::get('/utilisateurs/{utilisateur}/edit', [UtilisateurController::class, 'edit'])->name('utilisateurs.edit');
Route::put('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'update'])->name('utilisateurs.update');
Route::delete('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'destroy'])->name('utilisateurs.destroy');

// Livreurs
Route::get('/livreurs', [LivreurController::class, 'index'])->name('livreurs.index');
Route::get('/livreurs/create', [LivreurController::class, 'create'])->name('livreurs.create');
Route::post('/livreurs', [LivreurController::class, 'store'])->name('livreurs.store');
Route::get('/livreurs/{livreur}', [LivreurController::class, 'show'])->name('livreurs.show');
Route::get('/livreurs/{livreur}/edit', [LivreurController::class, 'edit'])->name('livreurs.edit');
Route::put('/livreurs/{livreur}', [LivreurController::class, 'update'])->name('livreurs.update');
Route::delete('/livreurs/{livreur}', [LivreurController::class, 'destroy'])->name('livreurs.destroy');

// Promotions
Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions.index');
Route::get('/promotions/create', [PromotionController::class, 'create'])->name('promotions.create');
Route::post('/promotions', [PromotionController::class, 'store'])->name('promotions.store');
Route::get('/promotions/{promotion}', [PromotionController::class, 'show'])->name('promotions.show');
Route::get('/promotions/{promotion}/edit', [PromotionController::class, 'edit'])->name('promotions.edit');
Route::put('/promotions/{promotion}', [PromotionController::class, 'update'])->name('promotions.update');
Route::delete('/promotions/{promotion}', [PromotionController::class, 'destroy'])->name('promotions.destroy');

// Statistiques
Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques');

// Zones de livraison
Route::get('/zones-livraison', [ZoneLivraisonController::class, 'index'])->name('zones-livraison.index');
Route::get('/zones-livraison/create', [ZoneLivraisonController::class, 'create'])->name('zones-livraison.create');
Route::post('/zones-livraison', [ZoneLivraisonController::class, 'store'])->name('zones-livraison.store');
Route::get('/zones-livraison/{zone}', [ZoneLivraisonController::class, 'show'])->name('zones-livraison.show');
Route::get('/zones-livraison/{zone}/edit', [ZoneLivraisonController::class, 'edit'])->name('zones-livraison.edit');
Route::put('/zones-livraison/{zone}', [ZoneLivraisonController::class, 'update'])->name('zones-livraison.update');
Route::delete('/zones-livraison/{zone}', [ZoneLivraisonController::class, 'destroy'])->name('zones-livraison.destroy');

// Paramètres
Route::get('/parametres', [ParametreController::class, 'index'])->name('parametres');
Route::post('/parametres', [ParametreController::class, 'update'])->name('parametres.update');


// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes pour la barre de navigation
Route::get('/find-food', [FoodController::class, 'index'])->name('find-food');
Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking');
Route::get('/location', [LocationController::class, 'index'])->name('location');
Route::get('/find-restaurant', [FrestaurantController::class, 'index'])->name('find-restaurant');

// Routes pour la partie paiement
Route::middleware(['auth'])->group(function () {
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
});

require __DIR__.'/auth.php';
