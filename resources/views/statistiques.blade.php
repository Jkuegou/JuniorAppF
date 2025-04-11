<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuniorMarket - Statistiques</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <style>
        :root {
            --primary-color: #FF6B00;
            --secondary-color: #4C56F9;
            --light-gray: #f5f5f5;
            --border-gray: #e0e0e0;
            --text-dark: #333;
            --success-green: #28a745;
            --warning-yellow: #ffc107;
            --danger-red: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        /* SIDEBAR - même style que celui existant */
        .sidebar {
            width: 250px;
            background-color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            border-right: 1px solid var(--border-gray);
            overflow-y: auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }

        .logo {
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--border-gray);
        }

        .logo span {
            color: var(--primary-color);
        }

        .menu-toggle {
            display: none;
            padding: 15px;
            cursor: pointer;
            font-size: 20px;
        }

        .nav-menu {
            list-style: none;
            padding: 10px 0;
        }

        .nav-item {
            padding: 10px 20px;
            margin: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            color: var(--text-dark);
            transition: all 0.3s;
        }

        .nav-item:hover {
            background-color: rgba(255, 107, 0, 0.1);
            color: var(--primary-color);
        }

        .nav-item.active {
            background-color: var(--primary-color);
            color: white;
        }

        .nav-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 24px;
            font-weight: bold;
            color: var(--text-dark);
        }

        .search-container {
            display: flex;
            align-items: center;
            background-color: var(--light-gray);
            border-radius: 20px;
            padding: 5px 15px;
            width: 300px;
        }

        .search-container input {
            border: none;
            background: transparent;
            padding: 8px;
            width: 100%;
            outline: none;
        }

        .search-container i {
            color: #999;
        }

        .user-actions {
            display: flex;
            align-items: center;
        }

        .notification {
            position: relative;
            margin-right: 15px;
            font-size: 18px;
            color: #555;
            cursor: pointer;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            width: 15px;
            height: 15px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .profile img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* STATS PAGE SPECIFIC */
        .stats-filter {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .date-filter {
            display: flex;
            gap: 10px;
        }

        .date-input {
            padding: 8px 15px;
            border: 1px solid var(--border-gray);
            border-radius: 5px;
        }

        .filter-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .period-tabs {
            display: flex;
            gap: 10px;
        }

        .period-tab {
            padding: 8px 15px;
            border: 1px solid var(--border-gray);
            border-radius: 5px;
            cursor: pointer;
            background-color: white;
        }

        .period-tab.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .stats-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .stats-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .stats-card-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .stats-card-value {
            font-size: 24px;
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .stats-card-trend {
            display: flex;
            align-items: center;
            font-size: 12px;
        }

        .trend-up {
            color: var(--success-green);
        }

        .trend-down {
            color: var(--danger-red);
        }

        .charts-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .chart-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .chart-title {
            font-size: 16px;
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .chart-container {
            height: 300px;
        }

        .table-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .table-title {
            font-size: 16px;
            font-weight: bold;
            color: var(--text-dark);
        }

        .export-btn {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-gray);
        }

        th {
            background-color: var(--light-gray);
            font-weight: 600;
        }

        tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .stats-cards {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .charts-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px;
            }

            .search-container {
                width: 100%;
                margin: 15px 0;
            }

            .user-actions {
                align-self: flex-end;
            }
            
            .stats-filter {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .date-filter {
                width: 100%;
            }
            
            .period-tabs {
                width: 100%;
                justify-content: space-between;
            }
            
            .stats-cards {
                grid-template-columns: 1fr;
            }
        }

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
            <a href="{{ route('dashboard') }}" >
                 <div class="logo-text">Junior<span>Maket</span></div>
                </a>
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
            <h2>Statistiques</h2>
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

        <!-- STATS FILTER -->
        <div class="stats-filter">
            <div class="date-filter">
                <input type="date" class="date-input" value="2023-03-01">
                <input type="date" class="date-input" value="2023-03-31">
                <button class="filter-btn">Filtrer</button>
            </div>
            <div class="period-tabs">
                <div class="period-tab">Aujourd'hui</div>
                <div class="period-tab">Cette semaine</div>
                <div class="period-tab active">Ce mois</div>
                <div class="period-tab">Cette année</div>
            </div>
        </div>

        <!-- STATS CARDS -->
        <div class="stats-cards">
            <div class="stats-card">
                <div class="stats-card-title">Commandes</div>
                <div class="stats-card-value">1,248</div>
                <div class="stats-card-trend trend-up">
                    <i class="fas fa-arrow-up"></i> 12.5% depuis la période précédente
                </div>
            </div>
            <div class="stats-card">
                <div class="stats-card-title">Chiffre d'affaires</div>
                <div class="stats-card-value">32,450€</div>
                <div class="stats-card-trend trend-up">
                    <i class="fas fa-arrow-up"></i> 8.2% depuis la période précédente
                </div>
            </div>
            <div class="stats-card">
                <div class="stats-card-title">Nouveaux utilisateurs</div>
                <div class="stats-card-value">254</div>
                <div class="stats-card-trend trend-up">
                    <i class="fas fa-arrow-up"></i> 5.4% depuis la période précédente
                </div>
            </div>
            <div class="stats-card">
                <div class="stats-card-title">Panier moyen</div>
                <div class="stats-card-value">26.42€</div>
                <div class="stats-card-trend trend-down">
                    <i class="fas fa-arrow-down"></i> 2.1% depuis la période précédente
                </div>
            </div>
        </div>

        <!-- CHARTS -->
        <div class="charts-container">
            <div class="chart-card">
                <div class="chart-title">Évolution des commandes</div>
                <div class="chart-container">
                    <canvas id="ordersChart"></canvas>
                </div>
            </div>
            <div class="chart-card">
                <div class="chart-title">Chiffre d'affaires par catégorie</div>
                <div class="chart-container">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>

        <!-- TOP RESTAURANTS TABLE -->
        <div class="table-container">
            <div class="table-header">
                <div class="table-title">Top restaurants</div>
                <button class="export-btn">
                    <i class="fas fa-download"></i> Exporter
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Restaurant</th>
                        <th>Commandes</th>
                        <th>CA</th>
                        <th>Panier moyen</th>
                        <th>Évaluation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Burger Deluxe</td>
                        <td>145</td>
                        <td>3,625€</td>
                        <td>25.00€</td>
                        <td>4.8/5</td>
                    </tr>
                    <tr>
                        <td>Pizza Express</td>
                        <td>132</td>
                        <td>3,168€</td>
                        <td>24.00€</td>
                        <td>4.7/5</td>
                    </tr>
                    <tr>
                        <td>Sushi Master</td>
                        <td>118</td>
                        <td>3,304€</td>
                        <td>28.00€</td>
                        <td>4.9/5</td>
                    </tr>
                    <tr>
                        <td>Pasta Palace</td>
                        <td>104</td>
                        <td>2,808€</td>
                        <td>27.00€</td>
                        <td>4.6/5</td>
                    </tr>
                    <tr>
                        <td>Thai Delight</td>
                        <td>95</td>
                        <td>2,470€</td>
                        <td>26.00€</td>
                        <td>4.7/5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Toggle sidebar sur mobile
        const menuToggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');

        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });

        // Charts
        const ordersCtx = document.getElementById('ordersChart').getContext('2d');
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');

        // Graphique d'évolution des commandes
        const ordersChart = new Chart(ordersCtx, {
            type: 'line',
            data: {
                labels: ['1 Mar', '5 Mar', '10 Mar', '15 Mar', '20 Mar', '25 Mar', '30 Mar'],
                datasets: [{
                    label: 'Commandes',
                    data: [38, 45, 42, 50, 47, 55, 58],
                    borderColor: '#FF6B00',
                    backgroundColor: 'rgba(255, 107, 0, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Graphique de chiffre d'affaires par catégorie
        const revenueChart = new Chart(revenueCtx, {
            type: 'pie',
            data: {
                labels: ['Burger', 'Pizza', 'Sushi', 'Pasta', 'Thai', 'Autres'],
                datasets: [{
                    data: [25, 20, 18, 15, 12, 10],
                    backgroundColor: [
                        '#FF6B00',
                        '#4C56F9',
                        '#28a745',
                        '#ffc107',
                        '#dc3545',
                        '#6c757d'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });

        // Period tabs
        const periodTabs = document.querySelectorAll('.period-tab');
        periodTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                periodTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>