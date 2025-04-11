<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Commandes - JuniorMarket</title>
  <style>
    :root {
      --primary: #ff6600;
      --secondary: #4154f1;
      --danger: #f14141;
      --success: #41b883;
      --warning: #ffaa00;
      --light: #f8f9fa;
      --dark: #333;
      --gray: #6c757d;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    body {
      background-color: #f5f5f5;
    }
    
    .page-container {
      display: flex;
      min-height: 100vh;
    }
    
    .sidebar {
      width: 300px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px 0;
    }
    
    .logo {
      padding: 10px 20px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
    }
    
    .logo h1 {
      color: #333;
      font-weight: 700;
    }
    
    .logo span {
      color: var(--primary);
    }
    
    .nav-menu {
      list-style: none;
    }
    
    .nav-item {
      margin-bottom: 5px;
    }
    
    .nav-link {
      display: flex;
      align-items: center;
      padding: 15px 20px;
      color: #333;
      text-decoration: none;
      transition: all 0.3s;
    }
    
    .nav-link.active {
      background-color: var(--primary);
      color: white;
    }
    
    .nav-link:hover:not(.active) {
      background-color: #f1f1f1;
    }
    
    .nav-icon {
      margin-right: 10px;
      width: 20px;
      text-align: center;
    }
    
    .main-content {
      flex: 1;
      padding: 20px;
    }
    
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 0;
      margin-bottom: 20px;
    }
    
    .search-bar {
      display: flex;
      align-items: center;
      background-color: white;
      border-radius: 50px;
      padding: 5px 15px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .search-bar input {
      border: none;
      outline: none;
      padding: 10px;
      width: 250px;
    }
    
    .notification-area {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    
    .notification-icon {
      position: relative;
      cursor: pointer;
    }
    
    .badge {
      position: absolute;
      top: -5px;
      right: -5px;
      background-color: var(--danger);
      color: white;
      border-radius: 50%;
      width: 18px;
      height: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
    }
    
    .card {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      overflow: hidden;
    }
    
    .card-header {
      padding: 15px 20px;
      border-bottom: 1px solid #eee;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .card-title {
      margin: 0;
      font-size: 18px;
      font-weight: 600;
    }
    
    .card-body {
      padding: 20px;
    }
    
    .filter-bar {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }
    
    .filter-item {
      padding: 8px 15px;
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 20px;
      cursor: pointer;
      transition: all 0.3s;
    }
    
    .filter-item.active {
      background-color: var(--primary);
      color: white;
      border-color: var(--primary);
    }
    
    .table-container {
      overflow-x: auto;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }
    
    th {
      background-color: #f8f9fa;
      font-weight: 600;
    }
    
    tr:hover {
      background-color: #f8f9fa;
    }
    
    .status {
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 500;
    }
    
    .status-pending {
      background-color: #fff3e0;
      color: var(--warning);
    }
    
    .status-preparing {
      background-color: #e3f2fd;
      color: var(--secondary);
    }
    
    .status-ready {
      background-color: #e0f7fa;
      color: #00bcd4;
    }
    
    .status-delivering {
      background-color: #e8f5e9;
      color: var(--success);
    }
    
    .status-completed {
      background-color: #e8f5e9;
      color: var(--success);
    }
    
    .status-cancelled {
      background-color: #fce4e4;
      color: var(--danger);
    }
    
    .action-buttons {
      display: flex;
      gap: 5px;
    }
    
    .btn {
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 14px;
    }
    
    .btn-primary {
      background-color: var(--primary);
      color: white;
    }
    
    .btn-secondary {
      background-color: var(--secondary);
      color: white;
    }
    
    .btn-success {
      background-color: var(--success);
      color: white;
    }
    
    .btn-danger {
      background-color: var(--danger);
      color: white;
    }
    
    .btn:hover {
      opacity: 0.9;
    }
    
    .pagination {
      display: flex;
      justify-content: flex-end;
      margin-top: 20px;
      gap: 5px;
    }
    
    .page-item {
      width: 30px;
      height: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid #ddd;
      cursor: pointer;
      transition: all 0.3s;
    }
    
    .page-item.active {
      background-color: var(--primary);
      color: white;
      border-color: var(--primary);
    }
    
    .page-item:hover:not(.active) {
      background-color: #f1f1f1;
    }
    
    .order-details-modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }
    
    .modal-content {
      background-color: white;
      border-radius: 10px;
      width: 80%;
      max-width: 800px;
      max-height: 90vh;
      overflow-y: auto;
    }
    
    .modal-header {
      padding: 15px 20px;
      border-bottom: 1px solid #eee;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .modal-body {
      padding: 20px;
    }
    
    .modal-footer {
      padding: 15px 20px;
      border-top: 1px solid #eee;
      display: flex;
      justify-content: flex-end;
      gap: 10px;
    }
    
    .close-btn {
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
    }
    
    .order-info {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 15px;
      margin-bottom: 20px;
    }
    
    .info-item {
      border: 1px solid #eee;
      border-radius: 5px;
      padding: 10px;
    }
    
    .info-label {
      font-size: 12px;
      color: var(--gray);
      margin-bottom: 5px;
    }
    
    .info-value {
      font-weight: 600;
    }
    
    .order-items {
      margin-top: 20px;
    }
    
    .item-row {
      display: flex;
      justify-content: space-between;
      padding: 10px 0;
      border-bottom: 1px solid #eee;
    }
    
    .item-details {
      flex: 1;
    }
    
    .item-name {
      font-weight: 600;
    }
    
    .item-options {
      font-size: 14px;
      color: var(--gray);
      margin-top: 5px;
    }
    
    .item-price {
      font-weight: 600;
      text-align: right;
    }
    
    .total-row {
      display: flex;
      justify-content: space-between;
      padding: 15px 0;
      border-top: 2px solid #eee;
      margin-top: 10px;
      font-weight: 700;
    }
    
    .user-dropdown {
      position: relative;
      display: inline-block;
    }
    
    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
    }
    
    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      overflow: hidden;
    }
    
    .user-avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
    .user-details {
      display: flex;
      flex-direction: column;
    }
    
    .user-name {
      font-weight: 600;
    }
    
    .user-role {
      font-size: 12px;
      color: var(--gray);
    }
    
    .dropdown-menu {
      position: absolute;
      top: 100%;
      right: 0;
      background-color: white;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      min-width: 180px;
      z-index: 100;
      display: none;
    }
    
    .dropdown-item {
      padding: 10px 15px;
      display: block;
      color: #333;
      text-decoration: none;
      transition: all 0.3s;
    }
    
    .dropdown-item:hover {
      background-color: #f1f1f1;
    }
    
    .logout-item {
      border-top: 1px solid #eee;
    }
    
    /* Responsive */
    @media (max-width: 992px) {
      .sidebar {
        width: 70px;
        overflow: hidden;
      }
      
      .logo span, .nav-text {
        display: none;
      }
      
      .nav-link {
        justify-content: center;
        padding: 15px;
      }
      
      .nav-icon {
        margin-right: 0;
      }
      
      .user-details {
        display: none;
      }
    }
    
    @media (max-width: 768px) {
      .card-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }
      
      .filter-bar {
        overflow-x: auto;
        padding-bottom: 10px;
      }
      
      .search-bar input {
        width: 150px;
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
                 <div class="logo-text">Junior<span>food</span></div>
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
      <h2>Commandes</h2>
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

      
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des commandes</h3>
          <div class="filter-bar">
            <div class="filter-item active">Toutes (248)</div>
            <div class="filter-item">En attente (42)</div>
            <div class="filter-item">En préparation (35)</div>
            <div class="filter-item">Prêtes (18)</div>
            <div class="filter-item">En livraison (23)</div>
            <div class="filter-item">Terminées (122)</div>
            <div class="filter-item">Annulées (8)</div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-container">
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Client</th>
                  <th>Restaurant</th>
                  <th>Date</th>
                  <th>Montant</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#CMD-1089</td>
                  <td>Thomas Dubois</td>
                  <td>Burger King</td>
                  <td>05/04/2025 12:30</td>
                  <td>28.50€</td>
                  <td><span class="status status-pending">En attente</span></td>
                  <td>
                    <div class="action-buttons">
                      <button class="btn btn-primary" onclick="openOrderDetails()">Détails</button>
                      <button class="btn btn-success">Accepter</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>#CMD-1088</td>
                  <td>Marie Laurent</td>
                  <td>Sushi Shop</td>
                  <td>05/04/2025 12:15</td>
                  <td>42.90€</td>
                  <td><span class="status status-preparing">En préparation</span></td>
                  <td>
                    <div class="action-buttons">
                      <button class="btn btn-primary" onclick="openOrderDetails()">Détails</button>
                      <button class="btn btn-secondary">Prêt</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>#CMD-1087</td>
                  <td>Lucas Martin</td>
                  <td>McDonald's</td>
                  <td>05/04/2025 11:45</td>
                  <td>18.75€</td>
                  <td><span class="status status-ready">Prête</span></td>
                  <td>
                    <div class="action-buttons">
                      <button class="btn btn-primary" onclick="openOrderDetails()">Détails</button>
                      <button class="btn btn-secondary">Livrer</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>#CMD-1086</td>
                  <td>Sophie Petit</td>
                  <td>Pizza Hut</td>
                  <td>05/04/2025 11:30</td>
                  <td>35.20€</td>
                  <td><span class="status status-delivering">En livraison</span></td>
                  <td>
                    <div class="action-buttons">
                      <button class="btn btn-primary" onclick="openOrderDetails()">Détails</button>
                      <button class="btn btn-success">Livré</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>#CMD-1085</td>
                  <td>Paul Durand</td>
                  <td>KFC</td>
                  <td>05/04/2025 11:00</td>
                  <td>22.40€</td>
                  <td><span class="status status-completed">Terminée</span></td>
                  <td>
                    <div class="action-buttons">
                      <button class="btn btn-primary" onclick="openOrderDetails()">Détails</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>#CMD-1084</td>
                  <td>Emma Leroy</td>
                  <td>Subway</td>
                  <td>05/04/2025 10:45</td>
                  <td>15.90€</td>
                  <td><span class="status status-cancelled">Annulée</span></td>
                  <td>
                    <div class="action-buttons">
                      <button class="btn btn-primary" onclick="openOrderDetails()">Détails</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>#CMD-1083</td>
                  <td>Antoine Bernard</td>
                  <td>Domino's Pizza</td>
                  <td>05/04/2025 10:30</td>
                  <td>32.80€</td>
                  <td><span class="status status-completed">Terminée</span></td>
                  <td>
                    <div class="action-buttons">
                      <button class="btn btn-primary" onclick="openOrderDetails()">Détails</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="pagination">
            <div class="page-item">«</div>
            <div class="page-item active">1</div>
            <div class="page-item">2</div>
            <div class="page-item">3</div>
            <div class="page-item">4</div>
            <div class="page-item">»</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal pour les détails de la commande -->
  <div class="order-details-modal" id="orderDetailsModal">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Détails de la commande #CMD-1089</h3>
        <button class="close-btn" onclick="closeOrderDetails()">×</button>
      </div>
      <div class="modal-body">
        <div class="order-info">
          <div class="info-item">
            <div class="info-label">Client</div>
            <div class="info-value">Thomas Dubois</div>
          </div>
          <div class="info-item">
            <div class="info-label">Téléphone</div>
            <div class="info-value">06 12 34 56 78</div>
          </div>
          <div class="info-item">
            <div class="info-label">Email</div>
            <div class="info-value">thomas.dubois@email.com</div>
          </div>
          <div class="info-item">
            <div class="info-label">Adresse</div>
            <div class="info-value">12 Rue de Paris, 75001 Paris</div>
          </div>
          <div class="info-item">
            <div class="info-label">Restaurant</div>
            <div class="info-value">Burger King</div>
          </div>
          <div class="info-item">
            <div class="info-label">Date</div>
            <div class="info-value">05/04/2025 12:30</div>
          </div>
          <div class="info-item">
            <div class="info-label">Statut</div>
            <div class="info-value"><span class="status status-pending">En attente</span></div>
          </div>
          <div class="info-item">
            <div class="info-label">Méthode de paiement</div>
            <div class="info-value">Carte bancaire</div>
          </div>
        </div>
        
        <div class="order-items">
          <h4>Articles commandés</h4>
          <div class="item-row">
            <div class="item-details">
              <div class="item-name">Whopper Menu</div>
              <div class="item-options">- Frites grandes, Coca-Cola Zero</div>
            </div>
            <div class="item-price">12.50€ x 1</div>
          </div>
          <div class="item-row">
            <div class="item-details">
              <div class="item-name">King Nuggets</div>
              <div class="item-options">- 9 pièces, Sauce Barbecue</div>
            </div>
            <div class="item-price">8.90€ x 1</div>
          </div>
          <div class="item-row">
            <div class="item-details">
              <div class="item-name">King Fusion Oreo</div>
              <div class="item-options"></div>
            </div>
            <div class="item-price">3.90€ x 1</div>
          </div>
          
          <div class="total-row">
            <div>Sous-total</div>
            <div>25.30€</div>
          </div>
          <div class="total-row">
            <div>Frais de livraison</div>
            <div>3.20€</div>
          </div>
          <div class="total-row">
            <div>Total</div>
            <div>28.50€</div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" onclick="closeOrderDetails()">Fermer</button>
        <button class="btn btn-success">Accepter la commande</button>
      </div>
    </div>
  </div>
  
  <script>
    function openOrderDetails() {
      document.getElementById('orderDetailsModal').style.display = 'flex';
    }
    
    function closeOrderDetails() {
      document.getElementById('orderDetailsModal').style.display = 'none';
    }
  </script>
</body>
</html>