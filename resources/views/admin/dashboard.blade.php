{{-- @extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">Admin Dashboard</h1>

        <!-- Stats Section -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Total Users</h2>
                <p class="text-3xl">500</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Active Users</h2>
                <p class="text-3xl">450</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Inactive Users</h2>
                <p class="text-3xl">50</p>
            </div>
        </div>

        <!-- Manage Users Section -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold">Manage Users</h2>
            <a href="#" class="text-blue-500 hover:text-blue-700">View All Users</a>
            
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
    <title>Juniorfood - Administration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #ff6b00;
            --secondary: #333;
            --text-dark: #333;
            --text-light: #666;
            --bg-light: #f9f9f9;
            --bg-white: #fff;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            --shadow-dark: 0 3px 10px rgba(0, 0, 0, 0.1);
            --border: 1px solid #eee;
            --radius: 10px;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: var(--bg-white);
            box-shadow: var(--shadow);
            height: 100vh;
            position: fixed;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            z-index: 100;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
        }

        .sidebar-header h2 {
            color: var(--text-dark);
            font-size: 22px;
            font-weight: 700;
        }

        .sidebar-header span {
            color: var(--primary);
        }

        .sidebar-toggle {
            width: 35px;
            height: 35px;
            background-color: var(--bg-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin-left: auto;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            background-color: var(--primary);
            color: white;
        }

        .sidebar-menu {
            padding: 10px 0;
            flex-grow: 1;
            overflow-y: auto;
        }

        .menu-item {
            padding: 10px 20px;
            display: flex;
            align-items: center;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
            margin: 5px 10px;
            border-radius: var(--radius);
        }

        .menu-item:hover, .menu-item.active {
            background-color: var(--primary);
            color: white;
        }

        .menu-item i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
        }

        .menu-item span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-footer {
            padding: 20px;
            border-top: var(--border);
        }

        .sidebar-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info {
            flex-grow: 1;
            overflow: hidden;
        }

        .profile-name {
            font-weight: 600;
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .profile-role {
            font-size: 12px;
            color: var(--text-light);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
            transition: all 0.3s ease;
            padding: 20px;
        }

        .main-content.expanded {
            margin-left: 70px;
            width: calc(100% - 70px);
        }

        /* Top Navigation */
        .top-nav {
            background-color: var(--bg-white);
            border-radius: var(--radius);
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
        }

        .top-nav h2 {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .search-box {
            display: flex;
            align-items: center;
            background-color: var(--bg-light);
            border-radius: 30px;
            padding: 6px 15px;
            width: 300px;
        }

        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            width: 100%;
            padding: 5px;
            font-size: 14px;
        }

        .search-box i {
            color: var(--text-light);
        }

        .nav-icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            background-color: var(--bg-light);
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-icon:hover {
            background-color: var(--primary);
            color: white;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ff4444;
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 600;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            background-color: var(--bg-white);
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
        }

        .stat-info {
            text-align: right;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--text-light);
        }

        .stat-increase {
            font-size: 12px;
            color: #00c853;
            display: flex;
            align-items: center;
            gap: 3px;
            justify-content: flex-end;
        }

        .stat-decrease {
            font-size: 12px;
            color: #ff4444;
            display: flex;
            align-items: center;
            gap: 3px;
            justify-content: flex-end;
        }

        /* Charts */
        .charts-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .chart-card {
            background-color: var(--bg-white);
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow);
        }

        .chart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .chart-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .chart-actions {
            display: flex;
            gap: 10px;
        }

        .chart-action {
            background-color: var(--bg-light);
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: 500;
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .chart-action:hover {
            background-color: var(--primary);
            color: white;
        }

        .chart-placeholder {
            height: 250px;
            background-color: #f2f2f2;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
        }

        /* Tables */
        .table-card {
            background-color: var(--bg-white);
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 20px;
        }

        .table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .table-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .table-action {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .table-action:hover {
            background-color: #e05d00;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 12px 15px;
            border-bottom: var(--border);
            font-weight: 600;
            color: var(--text-light);
            font-size: 14px;
        }

        td {
            padding: 12px 15px;
            border-bottom: var(--border);
            font-size: 14px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }

        .status-completed {
            background-color: #e6f7ed;
            color: #00c853;
        }

        .status-pending {
            background-color: #fff3e0;
            color: #ff9800;
        }

        .status-cancelled {
            background-color: #ffebee;
            color: #ff4444;
        }

        .action-btn {
            width: 30px;
            height: 30px;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background-color: var(--bg-light);
            color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
            }

            .sidebar .sidebar-header h2,
            .sidebar .menu-item span,
            .sidebar .profile-info {
                display: none;
            }

            .sidebar .sidebar-toggle {
                margin: 0;
            }

            .main-content {
                margin-left: 70px;
                width: calc(100% - 70px);
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }

            .search-box {
                width: 200px;
            }
        }

        @media (max-width: 576px) {
            .search-box {
                display: none;
            }

            .top-nav h2 {
                font-size: 16px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2>Junior<span>food</span></h2>
            <div class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('dashboardm') }}" class="menu-item active">
                <i class="fas fa-th-large"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('restaurants.index') }}" class="menu-item">
                <i class="fas fa-utensils"></i>
                <span>Restaurants</span>
            </a>
            <a  href="{{ route('plats.index') }}" class="menu-item">
                <i class="fas fa-hamburger"></i>
                <span>Plats</span>
            </a>
            <a  href="{{ route('commandes.index') }}" class="menu-item">
                <i class="fas fa-hamburger"></i>
                <span>commandes</span>
            </a>
            <a href="{{ route('utilisateurs.index') }}" class="menu-item">
                <i class="fas fa-users"></i>
                <span>Utilisateurs</span>
            </a>
            <a href="{{ route('livreurs.index') }}" class="menu-item">
                <i class="fas fa-motorcycle"></i>
                <span>Livreurs</span>
            </a>
            <a href="{{ route('promotions.index') }}" class="menu-item">
                <i class="fas fa-tags"></i>
                <span>Promotions</span>
            </a>
            <a href="{{ route('statistiques') }}" class="menu-item">
                <i class="fas fa-chart-line"></i>
                <span>Statistiques</span>
            </a>
            <a href="{{ route('zones-livraison.index') }}" class="menu-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>Zones de livraison</span>
            </a>
            <a href="{{ route('parametres') }}" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
        </div>
       <div class="sidebar-footer">
    <div class="sidebar-profile">
        <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80" alt="Profile" class="profile-img">
        <div class="profile-info">
            <div class="profile-name">{{ Auth::user()->name }}</div>
            <div class="profile-role">{{ Auth::user()->role }}</div>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="mt-2 w-full">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-700 text-sm w-full text-left">
                <i class="fas fa-sign-out-alt mr-1"></i> Déconnexion
            </button>
        </form>
    </div>
</div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Navigation -->
        <div class="top-nav">
            <h2>Dashboard</h2>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Rechercher...">
            </div>
            <div class="nav-icons">
                <div class="nav-icon">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </div>
                <div class="nav-icon">
                    <i class="fas fa-envelope"></i>
                    <span class="badge">5</span>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="nav-icon">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0; width: 100%; height: 100%;">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #4158D0;">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">248</div>
                    <div class="stat-label">Commandes</div>
                    <div class="stat-increase">
                        <i class="fas fa-arrow-up"></i> 15.8%
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #f43f5e;">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">1,257</div>
                    <div class="stat-label">Utilisateurs</div>
                    <div class="stat-increase">
                        <i class="fas fa-arrow-up"></i> 5.2%
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #8B5CF6;">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">32</div>
                    <div class="stat-label">Restaurants</div>
                    <div class="stat-increase">
                        <i class="fas fa-arrow-up"></i> 2.4%
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #0ea5e9;">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value">32,450€</div>
                    <div class="stat-label">Revenu total</div>
                    <div class="stat-decrease">
                        <i class="fas fa-arrow-down"></i> 3.1%
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="charts-grid">
            <div class="chart-card">
                <div class="chart-header">
                    <div class="chart-title">Commandes par jour</div>
                    <div class="chart-actions">
                        <button class="chart-action">Semaine</button>
                        <button class="chart-action">Mois</button>
                        <button class="chart-action">Année</button>
                    </div>
                </div>
                <div class="chart-placeholder">
                    Graphique des commandes (Données dynamiques)
                </div>
            </div>
            <div class="chart-card">
                <div class="chart-header">
                    <div class="chart-title">Revenus par catégorie</div>
                    <div class="chart-actions">
                        <button class="chart-action">Semaine</button>
                        <button class="chart-action">Mois</button>
                        <button class="chart-action">Année</button>
                    </div>
                </div>
                <div class="chart-placeholder">
                    Graphique des revenus (Données dynamiques)
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="table-card">
            <div class="table-header">
                <div class="table-title">Commandes récentes</div>
                <button class="table-action">
                    <i class="fas fa-plus"></i> Nouvelle commande
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Restaurant</th>
                        <th>Montant</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#ORD-2458</td>
                        <td>Sophie Martin</td>
                        <td>Pizza Delizioso</td>
                        <td>24.99€</td>
                        <td>04/04/2025</td>
                        <td><span class="status status-completed">Livré</span></td>
                        <td>
                            <div class="action-btn"><i class="fas fa-eye"></i></div>
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                        </td>
                    </tr>
                    <tr>
                        <td>#ORD-2457</td>
                        <td>Thomas Petit</td>
                        <td>Burger King</td>
                        <td>18.50€</td>
                        <td>04/04/2025</td>
                        <td><span class="status status-pending">En cours</span></td>
                        <td>
                            <div class="action-btn"><i class="fas fa-eye"></i></div>
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                        </td>
                    </tr>
                    <tr>
                        <td>#ORD-2456</td>
                        <td>Julie Durand</td>
                        <td>Sushi Master</td>
                        <td>32.75€</td>
                        <td>03/04/2025</td>
                        <td><span class="status status-completed">Livré</span></td>
                        <td>
                            <div class="action-btn"><i class="fas fa-eye"></i></div>
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                        </td>
                    </tr>
                    <tr>
                        <td>#ORD-2455</td>
                        <td>Antoine Leroy</td>
                        <td>Kebab House</td>
                        <td>15.25€</td>
                        <td>03/04/2025</td>
                        <td><span class="status status-cancelled">Annulé</span></td>
                        <td>
                            <div class="action-btn"><i class="fas fa-eye"></i></div>
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                        </td>
                    </tr>
                    <tr>
                        <td>#ORD-2454</td>
                        <td>Camille Bernard</td>
                        <td>Thai Spicy</td>
                        <td>27.50€</td>
                        <td>02/04/2025</td>
                        <td><span class="status status-completed">Livré</span></td>
                        <td>
                            <div class="action-btn"><i class="fas fa-eye"></i></div>
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Popular Restaurants Table -->
        <div class="table-card">
            <div class="table-header">
                <div class="table-title">Restaurants populaires</div>
                <button class="table-action">
                    <i class="fas fa-plus"></i> Ajouter restaurant
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Restaurant</th>
                        <th>Catégorie</th>
                        <th>Commandes</th>
                        <th>Revenu</th>
                        <th>Note</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pizza Delizioso</td>
                        <td>Italien</td>
                        <td>245</td>
                        <td>5,890€</td>
                        <td>4.8</td>
                        <td>
                            <div class="action-btn"><i class="fas fa-eye"></i></div>
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Burger King</td>
                        <td>Fast Food</td>
                        <td>198</td>
                        <td>4,560€</td>
                        <td>4.5</td>
                        <td>
                            <div class="action-btn"><i class="fas fa-eye"></i></div>
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Sushi Master</td>
                        <td>Japonais</td>
                        <td>176</td>
                        <td>5,120€</td>
                        <td>4.7</td>
                        <td>
                            <div class="action-btn"><i class="fas fa-eye"></i></div>
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Thai Spicy</td>
                        <td>Thaïlandais</td>
                        <td>143</td>
                        <td>3,870€</td>
                        <td>4.6</td>
                        <td>
                            <div class="action-btn"><i class="fas fa-eye"></i></div>
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Kebab House</td>
                        <td>Cuisine orientale</td>
                        <td>132</td>
                        <td>2,950€</td>
                        <td>4.4</td>
                        <td>
                            <div class="action-btn"><i class="fas fa-eye"></i></div>
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Sidebar toggle functionality
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarToggle = document.getElementById('sidebarToggle');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });

        // Notification and Message dropdown functionality
        const navIcons = document.querySelectorAll('.nav-icon');
        
        navIcons.forEach(icon => {
            icon.addEventListener('click', () => {
                // For logout functionality, we would normally redirect or call a logout API
                if (icon.querySelector('.fa-sign-out-alt')) {
                    // Implementation of logout logic would go here
                    alert('Déconnexion...');
                    // window.location.href = "{{ route('logout') }}";
                }
            });
        });
    </script>
</body>
</html>