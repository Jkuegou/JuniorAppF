<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuniorMarket - Zones de livraison</title>
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

        /* ZONES DE LIVRAISON SPECIFIC */
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .view-toggle {
            display: flex;
            background-color: var(--light-gray);
            border-radius: 5px;
            overflow: hidden;
        }

        .view-btn {
            padding: 8px 15px;
            cursor: pointer;
            border: none;
            background: transparent;
        }

        .view-btn.active {
            background-color: var(--primary-color);
            color: white;
        }

        .add-zone-btn {
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

        .map-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
            height: 400px;
            position: relative;
        }

        .map-placeholder {
            width: 100%;
            height: 100%;
            background-color: var(--light-gray);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #666;
        }

        .map-placeholder i {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .zones-list {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .zones-table {
            width: 100%;
            border-collapse: collapse;
        }

        .zones-table th, .zones-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-gray);
        }

        .zones-table th {
            background-color: var(--light-gray);
            font-weight: 600;
            color: var(--text-dark);
        }

        .zones-table tr:hover {
            background-color: var(--light-gray);
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status.active {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-green);
        }

        .status.inactive {
            background-color: rgba(108, 117, 125, 0.1);
            color: #6c757d;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions button {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 16px;
        }

        .actions .edit {
            color: var(--info-blue);
        }

        .actions .delete {
            color: #dc3545;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 60%;
            max-width: 700px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border-gray);
            padding-bottom: 10px;
        }

        .modal-title {
            font-size: 20px;
            font-weight: bold;
        }

        .close {
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-gray);
            border-radius: 5px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-secondary {
            background-color: var(--light-gray);
            color: var(--text-dark);
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
            gap: 5px;
        }

        .pagination button {
            width: 35px;
            height: 35px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            border: 1px solid var(--border-gray);
            cursor: pointer;
        }

        .pagination button.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
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
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .search-container {
                width: 100%;
            }
            
            .content-header {
                flex-direction: column;
                gap: 15px;
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
        <h2>Zones de Livraison</h2>
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
        <div class="content-header">
            <div class="view-toggle">
                <button class="view-btn active"><i class="fas fa-map"></i> Carte</button>
                <button class="view-btn"><i class="fas fa-list"></i> Liste</button>
            </div>
            <button class="add-zone-btn" id="openModalBtn">
                <i class="fas fa-plus"></i> Nouvelle zone
            </button>
        </div>

        <div class="map-container">
            <div class="map-placeholder">
                <i class="fas fa-map-marked-alt"></i>
                <p>Carte des zones de livraison</p>
                <small>Cliquez sur une zone pour afficher les détails</small>
            </div>
        </div>

        <div class="zones-list">
            <table class="zones-table">
                <thead>
                    <tr>
                        <th>Nom de la zone</th>
                        <th>Code Postal</th>
                        <th>Frais de livraison</th>
                        <th>Délai (min)</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Centre-ville</td>
                        <td>69001, 69002</td>
                        <td>2.50€</td>
                        <td>20-30</td>
                        <td><span class="status active">Actif</span></td>
                        <td class="actions">
                            <button class="edit"><i class="fas fa-edit"></i></button>
                            <button class="delete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Croix-Rousse</td>
                        <td>69004</td>
                        <td>3.00€</td>
                        <td>25-35</td>
                        <td><span class="status active">Actif</span></td>
                        <td class="actions">
                            <button class="edit"><i class="fas fa-edit"></i></button>
                            <button class="delete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Vieux Lyon</td>
                        <td>69005</td>
                        <td>2.50€</td>
                        <td>20-30</td>
                        <td><span class="status active">Actif</span></td>
                        <td class="actions">
                            <button class="edit"><i class="fas fa-edit"></i></button>
                            <button class="delete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Part-Dieu</td>
                        <td>69003</td>
                        <td>2.00€</td>
                        <td>15-25</td>
                        <td><span class="status active">Actif</span></td>
                        <td class="actions">
                            <button class="edit"><i class="fas fa-edit"></i></button>
                            <button class="delete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Villeurbanne</td>
                        <td>69100</td>
                        <td>3.50€</td>
                        <td>30-40</td>
                        <td><span class="status inactive">Inactif</span></td>
                        <td class="actions">
                            <button class="edit"><i class="fas fa-edit"></i></button>
                            <button class="delete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="pagination">
                <button><i class="fas fa-chevron-left"></i></button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>

    <!-- MODAL FOR ADDING/EDITING ZONE -->
    <div id="zoneModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Ajouter une nouvelle zone</h3>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form id="zoneForm">
                    <div class="form-group">
                        <label for="zoneName">Nom de la zone</label>
                        <input type="text" id="zoneName" class="form-control" placeholder="Ex: Centre-ville">
                    </div>
                    <div class="form-group">
                        <label for="postalCode">Code Postal</label>
                        <input type="text" id="postalCode" class="form-control" placeholder="Ex: 69001, 69002">
                    </div>
                    <div class="form-group">
                        <label for="deliveryFee">Frais de livraison (€)</label>
                        <input type="number" id="deliveryFee" class="form-control" placeholder="Ex: 2.50" step="0.5" min="0">
                    </div>
                    <div class="form-group">
                        <label for="minTime">Délai minimum (min)</label>
                        <input type="number" id="minTime" class="form-control" placeholder="Ex: 20" min="0">
                    </div>
                    <div class="form-group">
                        <label for="maxTime">Délai maximum (min)</label>
                        <input type="number" id="maxTime" class="form-control" placeholder="Ex: 30" min="0">
                    </div>
                    <div class="form-group">
                        <label for="status">Statut</label>
                        <select id="status" class="form-control">
                            <option value="active">Actif</option>
                            <option value="inactive">Inactif</option>
                        </select>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" id="closeModalBtn">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // View toggle functionality
        document.querySelectorAll('.view-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                if (this.textContent.includes('Carte')) {
                    document.querySelector('.map-container').style.display = 'block';
                    document.querySelector('.zones-list').style.display = 'none';
                } else {
                    document.querySelector('.map-container').style.display = 'none';
                    document.querySelector('.zones-list').style.display = 'block';
                }
            });
        });

        // Initialize view
        document.querySelector('.zones-list').style.display = 'none';

        // Modal functionality
        const modal = document.getElementById('zoneModal');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const closeModalX = document.querySelector('.close');

        openModalBtn.addEventListener('click', function() {
            modal.style.display = 'block';
        });

        closeModalBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        closeModalX.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        // Form submission (prevent default for demo)
        document.getElementById('zoneForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would handle form submission, e.g., send data to server
            modal.style.display = 'none';
            alert('Zone ajoutée avec succès !');
        });

        // Edit buttons functionality
        document.querySelectorAll('.edit').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelector('.modal-title').textContent = 'Modifier la zone';
                modal.style.display = 'block';
                // Here you would populate form with existing data
            });
        });

        // Delete buttons functionality
        document.querySelectorAll('.delete').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Êtes-vous sûr de vouloir supprimer cette zone?')) {
                    // Here you would handle deletion, e.g., send request to server
                    alert('Zone supprimée avec succès !');
                }
            });
        });
    </script>
</body>
</html>