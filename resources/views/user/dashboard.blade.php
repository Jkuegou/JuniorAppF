{{-- @extends('layouts.userdashbord')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">User Dashboard</h1>

        <!-- Profile Section -->
        <div class="mt-6">
            <h2 class="text-lg font-semibold">Profile</h2>
            <p>Name: {{ Auth::user()->name }}</p>
            <p>Email: {{ Auth::user()->email }}</p>
        </div>

        <!-- User Orders Section -->
        <div class="mt-6">
            <h2 class="text-lg font-semibold">Your Orders</h2>
            <ul>
                <li>Order #1 - Delivered</li>
                <li>Order #2 - In Progress</li>
                <li>Order #3 - Pending</li>
            </ul>
        </div>

        <!-- Logout Button -->
        <div class="mt-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-700">
                    Logout
                </button>
            </form>
        </div>
    </div>
@endsection --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>junior - Tableau de Bord Utilisateur</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-text {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .logo-text span {
            color: #ff7000;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-link {
            text-decoration: none;
            color: #666;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #ff7000;
        }

        .search-cart-profile {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-container {
            position: relative;
        }

        .search-input {
            padding: 10px 15px;
            padding-left: 40px;
            border-radius: 25px;
            border: 1px solid #ddd;
            width: 250px;
            font-size: 14px;
            outline: none;
            background-color: #f5f5f5;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .cart-container {
            position: relative;
        }

        .cart-icon {
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #ff7000;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .profile-container {
            position: relative;
        }

        .profile-img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid #eee;
        }

        .profile-dropdown {
            position: absolute;
            top: 45px;
            right: 0;
            background-color: white;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            border-radius: 8px;
            padding: 10px 0;
            min-width: 180px;
            display: none;
            z-index: 200;
        }

        .profile-dropdown.active {
            display: block;
        }

        .dropdown-item {
            padding: 10px 15px;
            display: block;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .dropdown-item:hover {
            background-color: #f5f5f5;
            color: #ff7000;
        }

        .dropdown-divider {
            height: 1px;
            background-color: #eee;
            margin: 5px 0;
        }

        /* Dashboard styles */
        .dashboard-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .dashboard-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .dashboard-title {
            font-size: 28px;
            color: #333;
            margin-right: 20px;
        }

        .last-order {
            color: #666;
            font-size: 14px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        .dashboard-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 7px 15px rgba(0,0,0,0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .card-icon {
            color: #ff7000;
        }

        .order-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 15px;
        }

        .order-info {
            flex: 1;
        }

        .order-restaurant {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .order-date,
        .order-items {
            font-size: 14px;
            color: #666;
        }

        .order-status {
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 20px;
            text-align: center;
            width: 85px;
        }

        .status-delivered {
            background-color: #e6f7ed;
            color: #0c8b51;
        }

        .status-processing {
            background-color: #fff8e6;
            color: #b78105;
        }

        .favorites-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .favorite-item {
            display: flex;
            align-items: center;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 8px;
        }

        .favorite-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .favorite-name {
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }

        .address-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f5f5f5;
        }

        .address-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .address-label {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .label-home {
            background-color: #e5f0ff;
            color: #3273dc;
        }

        .label-work {
            background-color: #effaf3;
            color: #257942;
        }

        .address-text {
            color: #555;
            font-size: 14px;
            line-height: 1.5;
        }

        .payment-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f5f5f5;
        }

        .payment-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .payment-logo {
            width: 40px;
            margin-right: 15px;
        }

        .payment-details {
            flex: 1;
        }

        .payment-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 3px;
        }

        .payment-number {
            font-size: 14px;
            color: #666;
        }

        .payment-expires {
            color: #999;
            font-size: 12px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .stat-item {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #ff7000;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 14px;
            color: #666;
        }

        .promotion-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .promotion-item {
            position: relative;
            height: 100px;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 15px;
        }

        .promotion-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.2;
            z-index: 1;
        }

        .promotion-content {
            position: relative;
            z-index: 2;
        }

        .promotion-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 3px;
        }

        .promotion-desc {
            font-size: 12px;
            color: #666;
        }

        .promotion-1 {
            background-color: #e5f0ff;
        }

        .promotion-2 {
            background-color: #ffefeb;
        }

        .view-all {
            display: block;
            text-align: center;
            color: #ff7000;
            text-decoration: none;
            margin-top: 15px;
            font-size: 14px;
            font-weight: 500;
        }

        .dashboard-footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            text-align: center;
            color: #999;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <div class="logo-text">junior<span>food</span></div>
        </div>
        
        <div class="nav-links">
            <a href="#" class="nav-link">Find Food</a>
            <a href="#" class="nav-link">Tracking</a>
            <a href="#" class="nav-link">Location</a>
            <a href="#" class="nav-link">Find Restaurant</a>
        </div>
        
        <div class="search-cart-profile">
            <div class="search-container">
                <span class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </span>
                <input type="text" class="search-input" placeholder="Rechercher">
            </div>
            
            <div class="cart-container">
                <span class="cart-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </span>
                <span class="cart-badge">2</span>
            </div>
            
            <div class="profile-container">
                <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80" alt="Profile" class="profile-img" id="profileImg">
                <div class="profile-dropdown" id="profileDropdown">
                    <a href="#" class="dropdown-item" id="dashboardLink">Tableau de bord</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}" class="mt-2 w-full">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm w-full text-left">
                            <i class="fas fa-sign-out-alt mr-1"></i> Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="dashboard-container">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Tableau de bord</h1>
            <span class="last-order">Dernière commande: il y a 2 jours</span>
        </div>

        <div class="dashboard-grid">
            <!-- Recent Orders Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">Commandes récentes</h2>
                    <span class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </span>
                </div>
                <div class="card-content">
                    <div class="order-item">
                        <img src="/api/placeholder/50/50" alt="Restaurant" class="order-img">
                        <div class="order-info">
                            <p class="order-restaurant">Pizza Express</p>
                            <p class="order-date">1 avril 2025</p>
                            <p class="order-items">2 articles • 25,90 €</p>
                        </div>
                        <span class="order-status status-delivered">Livré</span>
                    </div>
                    <div class="order-item">
                        <img src="/api/placeholder/50/50" alt="Restaurant" class="order-img">
                        <div class="order-info">
                            <p class="order-restaurant">Sushi World</p>
                            <p class="order-date">30 mars 2025</p>
                            <p class="order-items">3 articles • 42,50 €</p>
                        </div>
                        <span class="order-status status-delivered">Livré</span>
                    </div>
                    <div class="order-item">
                        <img src="/api/placeholder/50/50" alt="Restaurant" class="order-img">
                        <div class="order-info">
                            <p class="order-restaurant">Burger King</p>
                            <p class="order-date">28 mars 2025</p>
                            <p class="order-items">2 articles • 18,75 €</p>
                        </div>
                        <span class="order-status status-delivered">Livré</span>
                    </div>
                    <a href="#" class="view-all">Voir toutes les commandes</a>
                </div>
            </div>

            <!-- Saved Addresses Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">Adresses enregistrées</h2>
                    <span class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                    </span>
                </div>
                <div class="card-content">
                    <div class="address-item">
                        <span class="address-label label-home">Domicile</span>
                        <p class="address-text">123 Rue de la Paix, 75001 Paris, France</p>
                    </div>
                    <div class="address-item">
                        <span class="address-label label-work">Travail</span>
                        <p class="address-text">45 Avenue des Champs-Élysées, 75008 Paris, France</p>
                    </div>
                    <div class="address-item">
                        <span class="address-label label-home">Secondaire</span>
                        <p class="address-text">8 Rue du Faubourg Saint-Honoré, 75008 Paris, France</p>
                    </div>
                    <a href="#" class="view-all">Gérer les adresses</a>
                </div>
            </div>

            <!-- Payment Methods Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">Moyens de paiement</h2>
                    <span class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                            <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                        </svg>
                    </span>
                </div>
                <div class="card-content">
                    <div class="payment-item">
                        <svg class="payment-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="#1434CB" d="M470.1 231.3s7.6 37.2 9.3 45H446c3.3-8.9 16-43 16-43-3.1 4-5.9 7.8-9.4 12.1l-4.3 10.9-10.2 25H446l24.1-45zM576 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48zM152.5 331.2L215.7 176h-42.5l-39.3 106-4.3-21.5-14-71.4c-2.3-9.9-9.4-12.7-18.2-13.1H32.7l-.7 3.1c15.9 4 29.5 9.4 42.7 17.1l35.5 135h42.5zm94.5.2L272.1 176h-40.2l-25.1 155.4h40.1zm139.9-50.8c.2-17.7-10.6-31.2-33.7-42.3-14.1-7.1-22.7-11.9-22.7-19.2.2-6.6 7.3-13.4 23.1-13.4 13.1-.3 22.7 2.8 29.9 5.9l3.6 1.7 5.5-33.6c-7.9-3.1-20.5-6.6-36-6.6-39.7 0-67.6 21.2-67.8 51.4-.3 22.3 20 34.7 35.2 42.2 15.5 7.6 20.8 12.6 20.8 19.3-.2 10.4-12.6 15.2-24.1 15.2-16 0-24.6-2.5-37.7-8.3l-5.3-2.5-5.6 34.9c9.4 4.3 26.8 8.1 44.8 8.3 42.2.1 69.7-20.8 70-53zM528 331.4L495.6 176h-31.1c-9.6 0-16.9 2.8-21 12.9l-59.7 142.5H426s6.9-19.2 8.4-23.3H486c1.2 5.5 4.7 23.3 4.7 23.3H528z"/>
                        </svg>
                        <div class="payment-details">
                            <p class="payment-name">Carte Visa</p>
                            <p class="payment-number">**** **** **** 4242</p>
                            <p class="payment-expires">Expire: 04/28</p>
                        </div>
                    </div>
                    <div class="payment-item">
                        <svg class="payment-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="#ff5f00" d="M 82.88 171.7 L 258.03 171.7 L 258.03 342.37 L 82.88 342.37 Z" />
                            <path fill="#eb001b" d="M 92.35 257.04 C 92.35 219.71 109.34 186.58 136.94 165.08 C 122.94 154.12 105.07 147.54 85.65 147.54 C 38.33 147.54 0 196.36 0 257.04 C 0 317.71 38.33 366.54 85.65 366.54 C 105.07 366.54 122.94 359.96 136.94 349 C 109.34 327.5 92.35 294.36 92.35 257.04" />
                            <path fill="#f79e1b" d="M 340.92 257.04 C 340.92 317.71 302.59 366.54 255.27 366.54 C 235.85 366.54 217.97 359.96 203.98 349 C 231.58 327.5 248.57 294.36 248.57 257.04 C 248.57 219.71 231.58 186.58 203.98 165.08 C 217.97 154.12 235.85 147.54 255.27 147.54 C 302.59 147.54 340.92 196.36 340.92 257.04" />
                        </svg>
                        <div class="payment-details">
                            <p class="payment-name">Carte Mastercard</p>
                            <p class="payment-number">**** **** **** 6789</p>
                            <p class="payment-expires">Expire: 09/26</p>
                        </div>
                    </div>
                    <a href="#" class="view-all">Gérer les méthodes de paiement</a>
                </div>
            </div>

            <!-- Favorite Restaurants Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">Restaurants favoris</h2>
                    <span class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.<!-- Suite du code pour les Restaurants Favoris -->
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="card-content">
                                        <div class="favorites-list">
                                            <div class="favorite-item">
                                                <img src="/api/placeholder/40/40" alt="Restaurant" class="favorite-img">
                                                <span class="favorite-name">Pizza Express</span>
                                            </div>
                                            <div class="favorite-item">
                                                <img src="/api/placeholder/40/40" alt="Restaurant" class="favorite-img">
                                                <span class="favorite-name">Sushi World</span>
                                            </div>
                                            <div class="favorite-item">
                                                <img src="/api/placeholder/40/40" alt="Restaurant" class="favorite-img">
                                                <span class="favorite-name">Thai Délice</span>
                                            </div>
                                            <div class="favorite-item">
                                                <img src="/api/placeholder/40/40" alt="Restaurant" class="favorite-img">
                                                <span class="favorite-name">Burger King</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-all">Voir tous les favoris</a>
                                    </div>
                                </div>
                    
                                <!-- User Stats Card -->
                                <div class="dashboard-card">
                                    <div class="card-header">
                                        <h2 class="card-title">Statistiques</h2>
                                        <span class="card-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="card-content">
                                        <div class="stats-grid">
                                            <div class="stat-item">
                                                <div class="stat-value">12</div>
                                                <div class="stat-label">Commandes totales</div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="stat-value">3</div>
                                                <div class="stat-label">Ce mois-ci</div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="stat-value">29.5 €</div>
                                                <div class="stat-label">Panier moyen</div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="stat-value">15</div>
                                                <div class="stat-label">Minutes de livraison</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                                <!-- Promotions Card -->
                                <div class="dashboard-card">
                                    <div class="card-header">
                                        <h2 class="card-title">Promotions</h2>
                                        <span class="card-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="card-content">
                                        <div class="promotion-grid">
                                            <div class="promotion-item promotion-1">
                                                <img src="/api/placeholder/100/100" alt="Promotion" class="promotion-bg">
                                                <div class="promotion-content">
                                                    <div class="promotion-title">-30% sur la livraison</div>
                                                    <div class="promotion-desc">Code: LIVRAISON30</div>
                                                </div>
                                            </div>
                                            <div class="promotion-item promotion-2">
                                                <img src="/api/placeholder/100/100" alt="Promotion" class="promotion-bg">
                                                <div class="promotion-content">
                                                    <div class="promotion-title">1 Pizza achetée = 1 offerte</div>
                                                    <div class="promotion-desc">Pizza Express uniquement</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="view-all">Voir toutes les promotions</a>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="dashboard-footer">
                                <p>© 2025 junior. Tous droits réservés.</p>
                            </div>
                        </main>
                    
                        <script>
                            // JavaScript for profile dropdown functionality
                            document.addEventListener('DOMContentLoaded', function() {
                                const profileImg = document.getElementById('profileImg');
                                const profileDropdown = document.getElementById('profileDropdown');
                                
                                profileImg.addEventListener('click', function() {
                                    profileDropdown.classList.toggle('active');
                                });
                                
                                // Close dropdown when clicking outside
                                document.addEventListener('click', function(event) {
                                    if (!profileImg.contains(event.target) && !profileDropdown.contains(event.target)) {
                                        profileDropdown.classList.remove('active');
                                    }
                                });
                                
                                // Dashboard link functionality (currently just prevents default action)
                                const dashboardLink = document.getElementById('dashboardLink');
                                dashboardLink.addEventListener('click', function(event) {
                                    event.preventDefault();
                                    // Already on dashboard, no action needed
                                    profileDropdown.classList.remove('active');
                                });
                            });
                        </script>
                    </body>
                    </html>
