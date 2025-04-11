<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuniorMarket - Promotions</title>
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

        /* SIDEBAR */
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

        /* PROMOTIONS PAGE SPECIFIC */
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-container {
            display: flex;
            gap: 15px;
        }

        .filter-dropdown {
            padding: 8px 15px;
            border: 1px solid var(--border-gray);
            border-radius: 5px;
            background-color: white;
            cursor: pointer;
        }

        .add-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .add-btn:hover {
            background-color: #e05c00;
        }

        .promo-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .promo-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .promo-card:hover {
            transform: translateY(-5px);
        }

        .promo-image {
            height: 150px;
            width: 100%;
            background-color: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 48px;
        }

        .promo-content {
            padding: 20px;
        }

        .promo-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .promo-code {
            display: inline-block;
            background-color: var(--light-gray);
            padding: 5px 10px;
            border-radius: 5px;
            font-family: monospace;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .promo-details {
            margin-bottom: 15px;
        }

        .promo-detail {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .promo-detail-label {
            color: #666;
        }

        .promo-detail-value {
            font-weight: 500;
        }

        .promo-progress {
            margin-bottom: 15px;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 12px;
        }

        .progress-bar {
            height: 6px;
            background-color: var(--light-gray);
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: var(--primary-color);
        }

        .promo-actions {
            display: flex;
            justify-content: space-between;
        }

        .promo-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-active {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-green);
        }

        .status-scheduled {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning-yellow);
        }

        .status-expired {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger-red);
        }

        .promo-action-btns {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            width: 30px;
            height: 30px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #666;
            transition: all 0.2s;
        }

        .action-btn:hover {
            background-color: var(--light-gray);
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .pages {
            display: flex;
            gap: 5px;
        }

        .page-btn {
            width: 35px;
            height: 35px;
            border: 1px solid var(--border-gray);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            background-color: white;
        }

        .page-btn.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            max-width: 600px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-gray);
        }

        .modal-title {
            font-size: 18px;
            font-weight: bold;
        }

        .close-btn {
            cursor: pointer;
            font-size: 22px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-gray);
            border-radius: 5px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            display: block;
            width: 100%;
            margin-top: 20px;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .promo-cards {
                grid-template-columns: repeat(2, 1fr);
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

            .content-header {
                flex-direction: column;
                gap: 15px;
            }

            .filter-container {
                flex-wrap: wrap;
            }

            .modal-content {
                width: 90%;
            }
        }

        @media (max-width: 576px) {
            .promo-cards {
                grid-template-columns: 1fr;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
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
            <h2>Promotions</h2>
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

        <!-- PROMOTIONS CONTENT -->
        <div class="content-header">
            <div class="filter-container">
                <select class="filter-dropdown">
                    <option>Tous les statuts</option>
                    <option>Actif</option>
                    <option>Programmé</option>
                    <option>Expiré</option>
                </select>
                <select class="filter-dropdown">
                    <option>Tous les types</option>
                    <option>Pourcentage</option>
                    <option>Montant fixe</option>
                    <option>Livraison gratuite</option>
                </select>
            </div>
            <button class="add-btn" id="addPromoBtn">
                <i class="fas fa-plus"></i> Créer une promotion
            </button>
        </div>

        <div class="promo-cards">
            <div class="promo-card">
                <div class="promo-image">
                    <i class="fas fa-gift"></i>
                </div>
                <div class="promo-content">
                    <div class="promo-title">Bienvenue 20%</div>
                    <div class="promo-code">WELCOME20</div>
                    <div class="promo-details">
                        <div class="promo-detail">
                            <div class="promo-detail-label">Type</div>
                            <div class="promo-detail-value">Pourcentage (20%)</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Période</div>
                            <div class="promo-detail-value">Permanent</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Utilisations</div>
                            <div class="promo-detail-value">237 / Illimité</div>
                        </div>
                    </div>
                    <div class="promo-progress">
                        <div class="progress-label">
                            <span>Conversion</span>
                            <span>68%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 68%"></div>
                        </div>
                    </div>
                    <div class="promo-actions">
                        <div class="promo-status status-active">Actif</div>
                        <div class="promo-action-btns">
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                            <div class="action-btn"><i class="fas fa-trash"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="promo-card">
                <div class="promo-image">
                    <i class="fas fa-percentage"></i>
                </div>
                <div class="promo-content">
                    <div class="promo-title">Weekend 15%</div>
                    <div class="promo-code">WEEKEND15</div>
                    <div class="promo-details">
                        <div class="promo-detail">
                            <div class="promo-detail-label">Type</div>
                            <div class="promo-detail-value">Pourcentage (15%)</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Période</div>
                            <div class="promo-detail-value">Sam-Dim (récurrent)</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Utilisations</div>
                            <div class="promo-detail-value">186 / Illimité</div>
                        </div>
                    </div>
                    <div class="promo-progress">
                        <div class="progress-label">
                            <span>Conversion</span>
                            <span>72%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 72%"></div>
                        </div>
                    </div>
                    <div class="promo-actions">
                        <div class="promo-status status-scheduled">Programmé</div>
                        <div class="promo-action-btns">
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                            <div class="action-btn"><i class="fas fa-trash"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="promo-card">
                <div class="promo-image">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="promo-content">
                    <div class="promo-title">Livraison gratuite</div>
                    <div class="promo-code">FREELIV</div>
                    <div class="promo-details">
                        <div class="promo-detail">
                            <div class="promo-detail-label">Type</div>
                            <div class="promo-detail-value">Livraison gratuite</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Période</div>
                            <div class="promo-detail-value">01/03 - 15/03</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Utilisations</div>
                            <div class="promo-detail-value">312 / 500</div>
                        </div>
                    </div>
                    <div class="promo-progress">
                        <div class="progress-label">
                            <span>Utilisation</span>
                            <span>62.4%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 62.4%"></div>
                        </div>
                    </div>
                    <div class="promo-actions">
                        <div class="promo-status status-active">Actif</div>
                        <div class="promo-action-btns">
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                            <div class="action-btn"><i class="fas fa-trash"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="promo-card">
                <div class="promo-image">
                    <i class="fas fa-euro-sign"></i>
                </div>
                <div class="promo-content">
                    <div class="promo-title">5€ pour nouveaux</div>
                    <div class="promo-code">NEW5EUR</div>
                    <div class="promo-details">
                        <div class="promo-detail">
                            <div class="promo-detail-label">Type</div>
                            <div class="promo-detail-value">Montant fixe (5€)</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Période</div>
                            <div class="promo-detail-value">10/01 - 10/02</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Utilisations</div>
                            <div class="promo-detail-value">427 / 500</div>
                        </div>
                    </div>
                    <div class="promo-progress">
                        <div class="progress-label">
                            <span>Utilisation</span>
                            <span>85.4%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 85.4%"></div>
                        </div>
                    </div>
                    <div class="promo-actions">
                        <div class="promo-status status-expired">Expiré</div>
                        <div class="promo-action-btns">
                            <div class="action-btn"><i class="fas fa-copy"></i></div>
                            <div class="action-btn"><i class="fas fa-trash"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="promo-card">
                <div class="promo-image">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="promo-content">
                    <div class="promo-title">Restaurant du mois</div>
                    <div class="promo-code">RESTOMOIS</div>
                    <div class="promo-details">
                        <div class="promo-detail">
                            <div class="promo-detail-label">Type</div>
                            <div class="promo-detail-value">Pourcentage (10%)</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Période</div>
                            <div class="promo-detail-value">01/04 - 30/04</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Utilisations</div>
                            <div class="promo-detail-value">0 / Illimité</div>
                        </div>
                    </div>
                    <div class="promo-progress">
                        <div class="progress-label">
                            <span>Commence dans</span>
                            <span>2 jours</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 0%"></div>
                        </div>
                    </div>
                    <div class="promo-actions">
                        <div class="promo-status status-scheduled">Programmé</div>
                        <div class="promo-action-btns">
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                            <div class="action-btn"><i class="fas fa-trash"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="promo-card">
                <div class="promo-image">
                    <i class="fas fa-hamburger"></i>
                </div>
                <div class="promo-content">
                    <div class="promo-title">Midi Express</div>
                    <div class="promo-code">MIDI20</div>
                    <div class="promo-details">
                        <div class="promo-detail">
                            <div class="promo-detail-label">Type</div>
                            <div class="promo-detail-value">Pourcentage (20%)</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Période</div>
                            <div class="promo-detail-value">11h30-14h (L-V)</div>
                        </div>
                        <div class="promo-detail">
                            <div class="promo-detail-label">Utilisations</div>
                            <div class="promo-detail-value">183 / Illimité</div>
                        </div>
                    </div>
                    <div class="promo-progress">
                        <div class="progress-label">
                            <span>Conversion</span>
                            <span>53%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 53%"></div>
                        </div>
                    </div>
                    <div class="promo-actions">
                        <div class="promo-status status-active">Actif</div>
                        <div class="promo-action-btns">
                            <div class="action-btn"><i class="fas fa-edit"></i></div>
                            <div class="action-btn"><i class="fas fa-trash"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagination">
            <div>Affichage de 1 à 6 sur 14 entrées</div>
            <div class="pages">
                <div class="page-btn"><i class="fas fa-chevron-left"></i></div>
                <div class="page-btn active">1</div>
                <div class="page-btn">2</div>
                <div class="page-btn">3</div>
                <div class="page-btn"><i class="fas fa-chevron-right"></i></div>
            </div>
        </div>
    </div>

    <!-- MODAL ADD PROMOTION -->
    <div id="addPromoModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Créer une nouvelle promotion</div>
                <div class="close-btn">&times;</div>
            </div>
            <form id="addPromoForm">
                <div class="form-group">
                    <label for="promo_title">Titre de la promotion</label>
                    <input type="text" id="promo_title" name="promo_title" required>
                </div>
                <div class="form-group">
                    <label for="promo_code">Code promotionnel</label>
                    <input type="text" id="promo_code" name="promo_code" required>
                </div>
                <div class="form-group">
                    <label for="promo_type">Type de promotion</label>
                    <select id="promo_type" name="promo_type" required>
                        <option value="">Sélectionner un type</option>
                        <option value="percentage">Pourcentage</option>
                        <option value="fixed">Montant fixe</option>
                        <option value="free_delivery">Livraison gratuite</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="promo_value">Valeur</label>
                    <input type="number" id="promo_value" name="promo_value" min="0">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="start_date">Date de début</label>
                        <input type="date" id="start_date" name="start_date" required>
                    </div>
                    <!-- Complétion du modal de création de promotion -->
<div class="form-group">
    <label for="end_date">Date de fin</label>
    <input type="date" id="end_date" name="end_date" required>
</div>

<div class="form-group">
    <label for="usage_limit">Limite d'utilisation</label>
    <select id="usage_limit" name="usage_limit">
        <option value="unlimited">Illimité</option>
        <option value="limited">Limité</option>
    </select>
</div>

<div class="form-group">
    <label for="usage_count">Nombre d'utilisations maximum</label>
    <input type="number" id="usage_count" name="usage_count" min="1" value="100">
</div>

<div class="form-group">
    <label for="min_order">Montant minimum de commande</label>
    <input type="number" id="min_order" name="min_order" min="0" step="0.01" value="0">
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="3"></textarea>
</div>

<button type="submit" class="submit-btn">Créer la promotion</button>
</form>
</div>
</div>

<!-- JavaScript pour le modal -->
<script>
    // Ouvrir et fermer le modal
    const addPromoBtn = document.getElementById('addPromoBtn');
    const addPromoModal = document.getElementById('addPromoModal');
    const closeBtn = document.querySelector('.close-btn');

    addPromoBtn.addEventListener('click', function() {
        addPromoModal.style.display = 'block';
    });

    closeBtn.addEventListener('click', function() {
        addPromoModal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == addPromoModal) {
            addPromoModal.style.display = 'none';
        }
    });

    // Toggle sidebar sur mobile
    const menuToggle = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');

    menuToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
    });
</script>