<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuniorMarket - Paramètres</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #FF6B00;
            --secondary-color: #4C56F9;
            --light-gray: #f5f5f5;
            --border-gray: #e0e0e0;
            --text-dark: #333;
            --success-green: #28a745;
            --warning-yellow: #ffc107;
            --info-blue: #17a2b8;
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

        /* PARAMETRES SPECIFIC */
        .settings-container {
            display: flex;
            gap: 20px;
        }

        .settings-tabs {
            width: 250px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .settings-tab {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-gray);
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .settings-tab:hover {
            background-color: var(--light-gray);
        }

        .settings-tab.active {
            background-color: var(--primary-color);
            color: white;
        }

        .settings-tab i {
            width: 20px;
            text-align: center;
        }

        .settings-content {
            flex: 1;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
        }

        .settings-panel {
            display: none;
        }

        .settings-panel.active {
            display: block;
        }

        .panel-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-gray);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-gray);
            border-radius: 5px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(255, 107, 0, 0.2);
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .form-check input {
            margin-right: 10px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #e05a00;
        }

        .btn-secondary {
            background-color: var(--light-gray);
            color: var(--text-dark);
        }

        .btn-secondary:hover {
            background-color: #e0e0e0;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 14px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-info {
            background-color: rgba(23, 162, 184, 0.1);
            border: 1px solid rgba(23, 162, 184, 0.2);
            color: var(--info-blue);
        }

        .alert-warning {
            background-color: rgba(255, 193, 7, 0.1);
            border: 1px solid rgba(255, 193, 7, 0.2);
            color: var(--warning-yellow);
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.2);
            color: #dc3545;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--primary-color);
        }

        input:focus + .slider {
            box-shadow: 0 0 1px var(--primary-color);
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .color-picker {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .color-option {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .color-option.active {
            border-color: var(--text-dark);
        }

        .color-option:nth-child(1) {
            background-color: #FF6B00;
        }

        .color-option:nth-child(2) {
            background-color: #4C56F9;
        }

        .color-option:nth-child(3) {
            background-color: #28a745;
        }

        .color-option:nth-child(4) {
            background-color: #dc3545;
        }

        .color-option:nth-child(5) {
            background-color: #17a2b8;
        }

        .setting-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-gray);
        }

        .setting-item:last-child {
            border-bottom: none;
        }

        .setting-label {
            font-weight: 500;
        }

        .setting-description {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .settings-container {
                flex-direction: column;
            }
            
            .settings-tabs {
                width: 100%;
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

        .sidebar-header .logo-text {
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

            .sidebar .sidebar-header .logo-text,
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
        <h2>Parametres</h2>
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

        <div class="settings-container">
            <div class="settings-tabs">
                <div class="settings-tab active" data-target="general">
                    <i class="fas fa-sliders-h"></i>
                    <span>Général</span>
                </div>
                <div class="settings-tab" data-target="appearance">
                    <i class="fas fa-paint-brush"></i>
                    <span>Apparence</span>
                </div>
                <div class="settings-tab" data-target="notifications">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                </div>
                <div class="settings-tab" data-target="payment">
                    <i class="fas fa-credit-card"></i>
                    <span>Paiement</span>
                </div>
                <div class="settings-tab" data-target="api">
                    <i class="fas fa-code"></i>
                    <span>API & Intégrations</span>
                </div>
                <div class="settings-tab" data-target="security">
                    <i class="fas fa-shield-alt"></i>
                    <span>Sécurité</span>
                </div>
                <div class="settings-tab" data-target="users">
                    <i class="fas fa-user-cog"></i>
                    <span>Gestion des utilisateurs</span>
                </div>
            </div>

            <div class="settings-content">
                <!-- GENERAL SETTINGS -->
                <div class="settings-panel active" id="general">
                    <h3 class="panel-title">Paramètres généraux</h3>
                    
                    <div class="form-group">
                        <label for="appName">Nom de l'application</label>
                        <input type="text" id="appName" class="form-control" value="JuniorMarket">
                    </div>
                    
                    <div class="form-group">
                        <label for="contactEmail">Email de contact</label>
                        <input type="email" id="contactEmail" class="form-control" value="contact@JuniorMarket.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="supportPhone">Téléphone du support</label>
                        <input type="tel" id="supportPhone" class="form-control" value="+33 1 23 45 67 89">
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Mode maintenance</div>
                            <div class="setting-description">Mettez le site en mode maintenance pour effectuer des mises à jour</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Accepter de nouvelles commandes</div>
                            <div class="setting-description">Permettre aux clients de passer de nouvelles commandes</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Autoriser l'inscription de nouveaux utilisateurs</div>
                            <div class="setting-description">Permettre la création de nouveaux comptes</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="form-actions">
                        <button class="btn btn-secondary">Réinitialiser</button>
                        <button class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                </div>

                <!-- APPEARANCE SETTINGS -->
                <div class="settings-panel" id="appearance">
                    <h3 class="panel-title">Apparence</h3>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Thème</div>
                            <div class="setting-description">Choisissez le thème de l'application</div>
                        </div>
                        <select class="form-control" style="width: 200px;">
                            <option value="light">Clair</option>
                            <option value="dark">Sombre</option>
                            <option value="auto">Automatique</option>
                        </select>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Couleur principale</div>
                            <div class="setting-description">Choisissez la couleur d'accent de l'application</div>
                        </div>
                        <div class="color-picker">
                            <div class="color-option active"></div>
                            <div class="color-option"></div>
                            <div class="color-option"></div>
                            <div class="color-option"></div>
                            <div class="color-option"></div>
                        </div>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Logo</div>
                            <div class="setting-description">Uploadez un nouveau logo pour l'application</div>
                        </div>
                        <input type="file" id="logoUpload" style="display: none;">
                        <label for="logoUpload" class="btn btn-secondary btn-sm">Choisir un fichier</label>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Favicon</div>
                            <div class="setting-description">Uploadez un nouveau favicon (icône de navigateur)</div>
                        </div>
                        <input type="file" id="faviconUpload" style="display: none;">
                        <label for="faviconUpload" class="btn btn-secondary btn-sm">Choisir un fichier</label>
                    </div>
                    
                    <div class="form-actions">
                        <button class="btn btn-secondary">Réinitialiser</button>
                        <button class="btn btn-primary">Appliquer</button>
                    </div>
                </div>

                <!-- NOTIFICATIONS SETTINGS -->
                <div class="settings-panel" id="notifications">
                    <h3 class="panel-title">Notifications</h3>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Notification par email</div>
                            <div class="setting-description">Recevoir des notifications par email</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Notification par SMS</div>
                            <div class="setting-description">Recevoir des notifications par SMS</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Notifications push</div>
                            <div class="setting-description">Recevoir des notifications push dans le navigateur</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Sons de notification</div>
                            <div class="setting-description">Activer les sons lors de notifications</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <h4 style="margin: 20px 0 10px 0;">Événements</h4>
                    
                    <div class="form-check">
                        <input type="checkbox" id="newOrder" checked>
                        <label for="newOrder">Nouvelles commandes</label>
                    </div>
                    
                    <div class="form-check">
                        <input type="checkbox" id="orderStatus" checked>
                        <label for="orderStatus">Changements de statut des commandes</label>
                    </div>
                    
                    <div class="form-check">
                        <input type="checkbox" id="newUser">
                        <label for="newUser">Nouvel utilisateur inscrit</label>
                    </div>
                    
                    <div class="form-check">
                        <input type="checkbox" id="newReview" checked>
                        <label for="newReview">Nouvel avis client</label>
                    </div>
                    
                    <div class="form-actions">
                        <button class="btn btn-secondary">Réinitialiser</button>
                        <button class="btn btn-primary">Enregistrer les préférences</button>
                    </div>
                </div>

                <!-- PAYMENT SETTINGS -->
                <div class="settings-panel" id="payment">
                    <h3 class="panel-title">Méthodes de paiement</h3>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <div>Configurez les méthodes de paiement disponibles pour vos clients.</div>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Carte bancaire</div>
                            <div class="setting-description">Accepter les paiements par carte bancaire</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">PayPal</div>
                            <div class="setting-description">Accepter les paiements via PayPal</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Apple Pay</div>
                            <div class="setting-description">Accepter les paiements via Apple Pay</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Google Pay</div>
                            <div class="setting-description">Accepter les paiements via Google Pay</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Paiement à la livraison</div>
                            <div class="setting-description">Permettre le paiement en espèces à la livraison</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <h4 style="margin: 20px 0 10px 0;">Paramètres Stripe</h4>
                    
                    <div class="form-group">
                        <label for="stripePublic">Clé publique Stripe</label>
                        <input type="text" id="stripePublic" class="form-control" value="pk_test_1234567890">
                    </div>
                    
                    <div class="form-group">
                        <label for="stripeSecret">Clé secrète Stripe</label>
                        <input type="password" id="stripeSecret" class="form-control" value="sk_test_1234567890">
                    </div>
                    
                    <div class="form-actions">
                        <button class="btn btn-secondary">Réinitialiser</button>
                        <button class="btn btn-primary">Enregistrer les paramètres</button>
                    </div>
                </div>

                <!-- API SETTINGS -->
                <div class="settings-panel" id="api">
                    <h3 class="panel-title">API & Intégrations</h3>
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        <div>Ne partagez jamais vos clés API ou tokens avec des personnes non autorisées.</div>
                    </div>
                    
                    <div class="form-group">
                        <label>Clé API</label>
                        <div style="display: flex;">
                            <input type="text" class="form-control" value="jf_api_987654321" readonly style="border-radius: 5px 0 0 5px;">
                            <button class="btn btn-secondary" style="border-radius: 0 5px 5px 0;">Copier</button>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Secret API</label>
                        <div style="display: flex;">
                            <input type="password" class="form-control" value="secret_key_123456789" readonly style="border-radius: 5px 0 0 5px;">
                            <button class="btn btn-secondary" style="border-radius: 0 5px 5px 0;">Copier</button>
                        </div>
                    </div>
                    
                    <button class="btn btn-secondary">Regénérer les clés</button>
                    
                    <h4 style="margin: 20px 0 10px 0;">Webhooks</h4>
                    
                    <div class="form-group">
                        <label for="webhookUrl">URL du Webhook</label>
                        <input type="url" id="webhookUrl" class="form-control" placeholder="https://example.com/webhook">
                    </div>
                    
                    <h4 style="margin: 20px 0 10px 0;">Intégrations</h4>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Google Maps</div>
                            <div class="setting-description">Activer l'intégration avec Google Maps</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label for="googleMapsKey">Clé API Google Maps</label>
                        <input type="text" id="googleMapsKey" class="form-control" value="AIzaSyA1234567890">
                    </div>
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">SMS Gateway</div>
                            <div class="setting-description">Activer l'intégration avec un service de SMS</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="form-actions">
                        <button class="btn btn-secondary">Réinitialiser</button>
                        <button class="btn btn-primary">Enregistrer les intégrations</button>
                    </div>
                </div>

                <!-- SECURITY SETTINGS -->
                <div class="settings-panel" id="security">
                    <h3 class="panel-title">Sécurité</h3>
                    
                    <div class="alert alert-danger">
                        <i class="fas fa-shield-alt"></i>
                        <div>La sécurité de votre compte est primordiale. Assurez-vous d'utiliser un mot de passe fort.</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="currentPassword">Mot de passe actuel</label>
                        <input type="password" id="currentPassword" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="newPassword">Nouveau mot de passe</label>
                        <input type="password" id="newPassword" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="confirmPassword">Confirmer le mot de passe</label>
                        <input type="password" id="confirmPassword" class="form-control">
                    </div>
                    
                    <button class="btn btn-primary">Changer le mot de passe</button>
                    
                    <h4 style="margin: 20px 0 10px 0;">Authentification à deux facteurs (2FA)</h4>
                    
                    <div class="setting-item">
                        <div>
                            <div class="setting-label">Activer 2FA</div>
                            <div class="setting-description">Sécurisez votre compte avec l'authentification à deux facteurs</div>
                        </div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label>Méthode de 2FA</label>
                        <select class="form-control">
                            <option value="app">Application d'authentification</option>
                            <option value="sms">SMS</option>
                            <option value="email">Email</option>
                        </select>
                    </div>
                    
                    <h4 style="margin: 20px 0 10px 0;">Sessions actives</h4>
                    
                    <div style="background-color: var(--light-gray); border-radius: 5px; padding: 15px; margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <div style="font-weight: 500;">Chrome sur Windows</div>
                                <div style="font-size: 14px; color: #666;">Paris, France • Actif maintenant</div>
                            </div>
                            <div>
                                <span class="badge" style="background-color: var(--success-green); color: white; padding: 5px 10px; border-radius: 20px;">Actuel</span>
                            </div>
                        </div>
                    </div>
                    
                    <div style="background-color: var(--light-gray); border-radius: 5px; padding: 15px; margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <div style="font-weight: 500;">Safari sur iPhone</div>
                                <div style="font-size: 14px; color: #666;">Paris, France • Il y a 2 heures</div>
                            </div>
                            <div>
                                <button class="btn btn-danger btn-sm">Déconnecter</button>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-danger">Déconnecter toutes les autres sessions</button>
                    
                    <div class="form-actions">
                        <button class="btn btn-secondary">Annuler</button>
                        <button class="btn btn-primary">Enregistrer les paramètres</button>
                    </div>
                </div>

                <!-- USER MANAGEMENT SETTINGS -->
                <div class="settings-panel" id="users">
                    <h3 class="panel-title">Gestion des utilisateurs</h3>
                    
                    <div class="form-group">
                        <label>Rechercher un utilisateur</label>
                        <div style="display: flex;">
                            <input type="text" class="form-control" placeholder="Nom, email ou téléphone" style="border-radius: 5px 0 0 5px;">
                            <button class="btn btn-primary" style="border-radius: 0 5px 5px 0;"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    
                    <div style="margin: 20px 0;">
                        <button class="btn btn-primary"><i class="fas fa-user-plus"></i> Ajouter un utilisateur</button>
                    </div>
                    
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: var(--light-gray);">
                                <th style="padding: 10px; text-align: left; border-bottom: 1px solid var(--border-gray);">Utilisateur</th>
                                <th style="padding: 10px; text-align: left; border-bottom: 1px solid var(--border-gray);">Rôle</th>
                                <th style="padding: 10px; text-align: left; border-bottom: 1px solid var(--border-gray);">Statut</th>
                                <th style="padding: 10px; text-align: right; border-bottom: 1px solid var(--border-gray);">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray);">
                                    <div style="display: flex; align-items: center;">
                                        <img src="https://via.placeholder.com/35" alt="User" style="width: 35px; height: 35px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <div style="font-weight: 500;">Jean Dupont</div>
                                            <div style="font-size: 14px; color: #666;">jean.dupont@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray);">Administrateur</td>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray);">
                                    <span style="background-color: var(--success-green); color: white; padding: 3px 8px; border-radius: 20px; font-size: 12px;">Actif</span>
                                </td>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray); text-align: right;">
                                    <button class="btn btn-secondary btn-sm">Éditer</button>
                                    <button class="btn btn-danger btn-sm">Désactiver</button>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray);">
                                    <div style="display: flex; align-items: center;">
                                        <img src="https://via.placeholder.com/35" alt="User" style="width: 35px; height: 35px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <div style="font-weight: 500;">Marie Martin</div>
                                            <div style="font-size: 14px; color: #666;">marie.martin@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray);">Modérateur</td>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray);">
                                    <span style="background-color: var(--success-green); color: white; padding: 3px 8px; border-radius: 20px; font-size: 12px;">Actif</span>
                                </td>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray); text-align: right;">
                                    <button class="btn btn-secondary btn-sm">Éditer</button>
                                    <button class="btn btn-danger btn-sm">Désactiver</button>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray);">
                                    <div style="display: flex; align-items: center;">
                                        <img src="https://via.placeholder.com/35" alt="User" style="width: 35px; height: 35px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <div style="font-weight: 500;">Pierre Durand</div>
                                            <div style="font-size: 14px; color: #666;">pierre.durand@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray);">Utilisateur</td>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray);">
                                    <span style="background-color: var(--warning-yellow); color: white; padding: 3px 8px; border-radius: 20px; font-size: 12px;">Suspendu</span>
                                </td>
                                <td style="padding: 10px; border-bottom: 1px solid var(--border-gray); text-align: right;">
                                    <button class="btn btn-secondary btn-sm">Éditer</button>
                                    <button class="btn btn-success btn-sm">Activer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div style="display: flex; justify-content: center; margin-top: 20px;">
                        <ul style="display: flex; list-style: none; gap: 5px;">
                            <li><button class="btn btn-secondary btn-sm">Précédent</button></li>
                            <li><button class="btn btn-primary btn-sm">1</button></li>
                            <li><button class="btn btn-secondary btn-sm">2</button></li>
                            <li><button class="btn btn-secondary btn-sm">3</button></li>
                            <li><button class="btn btn-secondary btn-sm">Suivant</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });
        
        // Settings tab navigation
        const settingsTabs = document.querySelectorAll('.settings-tab');
        const settingsPanels = document.querySelectorAll('.settings-panel');
        
        settingsTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = tab.getAttribute('data-target');
                
                // Remove active class from all tabs and panels
                settingsTabs.forEach(t => t.classList.remove('active'));
                settingsPanels.forEach(p => p.classList.remove('active'));
                
                // Add active class to clicked tab and corresponding panel
                tab.classList.add('active');
                document.getElementById(target).classList.add('active');
            });
        });
        
        // Color picker functionality
        const colorOptions = document.querySelectorAll('.color-option');
        colorOptions.forEach(option => {
            option.addEventListener('click', () => {
                colorOptions.forEach(o => o.classList.remove('active'));
                option.classList.add('active');
                // Here you would typically update the theme color in a real app
            });
        });
    </script>
</body>
</html>