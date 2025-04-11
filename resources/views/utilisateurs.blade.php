<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuniorMarket - Utilisateurs</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #FF6B00;
            --secondary-color: #4C56F9;
            --light-gray: #f5f5f5;
            --border-gray: #e0e0e0;
            --text-dark: #333;
            --success-green: #28a745;
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

        /* UTILISATEURS PAGE SPECIFIC */
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .add-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            font-weight: 500;
        }

        .add-btn i {
            margin-right: 5px;
        }

        .filters-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filters {
            display: flex;
            gap: 15px;
        }

        .filter {
            background-color: white;
            border: 1px solid var(--border-gray);
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
        }

        .filter.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .users-table {
            width: 100%;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .users-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .users-table th {
            background-color: #f8f9fa;
            text-align: left;
            padding: 15px;
            color: #555;
            font-weight: 600;
            border-bottom: 1px solid var(--border-gray);
        }

        .users-table td {
            padding: 15px;
            border-bottom: 1px solid var(--border-gray);
            color: #333;
        }

        .users-table tr:last-child td {
            border-bottom: none;
        }

        .users-table tr:hover {
            background-color: #f8f9fa;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-name {
            font-weight: 500;
        }

        .user-email {
            font-size: 13px;
            color: #777;
        }

        .badge-status {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }

        .active-badge {
            background-color: #d4edda;
            color: #155724;
        }

        .inactive-badge {
            background-color: #f8d7da;
            color: #721c24;
        }

        .pending-badge {
            background-color: #fff3cd;
            color: #856404;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .action-btn {
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .edit-btn {
            background-color: #f0f0f0;
            color: #555;
        }

        .view-btn {
            background-color: var(--secondary-color);
            color: white;
        }

        .delete-btn {
            background-color: #f8d7da;
            color: #721c24;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .page-item {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            margin: 0 5px;
            cursor: pointer;
            border: 1px solid var(--border-gray);
        }

        .page-item.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 1050;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background-color: white;
            border-radius: 10px;
            width: 500px;
            max-width: 90%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 18px;
            font-weight: 600;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #555;
        }

        .modal-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid var(--border-gray);
            border-radius: 5px;
            font-size: 14px;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .modal-footer {
            padding: 15px 20px;
            border-top: 1px solid var(--border-gray);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .cancel-btn {
            background-color: #f0f0f0;
            color: #555;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
        }

        .save-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .menu-toggle {
                display: block;
                position: fixed;
                top: 10px;
                left: 10px;
                z-index: 1100;
                background-color: white;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .main-content {
                margin-left: 0;
                padding-top: 60px;
            }

            .filters-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .search-container {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .search-container {
                width: 100%;
            }

            .users-table {
                overflow-x: auto;
            }

            .filters {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <div class="menu-toggle">
        <i class="fas fa-bars"></i>
    </div>

    <div class="sidebar">
        <div class="logo">
           <a href="{{ route('dashboard') }}" >
                 <div class="logo-text">Junior<span>Maket</span></div>
                </a>
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <i class="fas fa-chart-line"></i>
                Dashboard
            </li>
            <li class="nav-item">
                <i class="fas fa-utensils"></i>
                Restaurants
            </li>
            <li class="nav-item">
                <i class="fas fa-hamburger"></i>
                Plats
            </li>
            <li class="nav-item active">
                <i class="fas fa-users"></i>
                Utilisateurs
            </li>
            <li class="nav-item">
                <i class="fas fa-motorcycle"></i>
                Livreurs
            </li>
            <li class="nav-item">
                <i class="fas fa-percent"></i>
                Promotions
            </li>
            <li class="nav-item">
                <i class="fas fa-chart-pie"></i>
                Statistiques
            </li>
            <li class="nav-item">
                <i class="fas fa-map-marker-alt"></i>
                Zones de livraison
            </li>
            <li class="nav-item">
                <i class="fas fa-cog"></i>
                Paramètres
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="page-title">Utilisateurs</div>
            <div class="search-container">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Rechercher...">
            </div>
            <div class="user-actions">
                <div class="notification">
                    <i class="fas fa-bell"></i>
                    <div class="badge">3</div>
                </div>
                <div class="profile">
                    <img src="/api/placeholder/40/40" alt="Profile">
                    <div>Admin</div>
                </div>
            </div>
        </div>

        <div class="content-header">
            <h2>Liste des utilisateurs</h2>
            <button class="add-btn" id="openModalBtn">
                <i class="fas fa-plus"></i>
                Ajouter un utilisateur
            </button>
        </div>

        <div class="filters-container">
            <div class="filters">
                <div class="filter active">Tous</div>
                <div class="filter">Actifs</div>
                <div class="filter">Inactifs</div>
                <div class="filter">En attente</div>
            </div>
            <div class="search-container">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Rechercher un utilisateur...">
            </div>
        </div>

        <div class="users-table">
            <table>
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Date d'inscription</th>
                        <th>Commandes</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="user-info">
                                <img src="/api/placeholder/40/40" alt="User">
                                <div>
                                    <div class="user-name">Sophie Martin</div>
                                    <div class="user-email">sophie.martin@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>12/01/2023</td>
                        <td>24</td>
                        <td><span class="badge-status active-badge">Actif</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view-btn">Voir</button>
                                <button class="action-btn edit-btn">Éditer</button>
                                <button class="action-btn delete-btn">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-info">
                                <img src="/api/placeholder/40/40" alt="User">
                                <div>
                                    <div class="user-name">Thomas Dubois</div>
                                    <div class="user-email">thomas.dubois@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>24/02/2023</td>
                        <td>18</td>
                        <td><span class="badge-status active-badge">Actif</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view-btn">Voir</button>
                                <button class="action-btn edit-btn">Éditer</button>
                                <button class="action-btn delete-btn">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-info">
                                <img src="/api/placeholder/40/40" alt="User">
                                <div>
                                    <div class="user-name">Julie Blanc</div>
                                    <div class="user-email">julie.blanc@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>05/03/2023</td>
                        <td>32</td>
                        <td><span class="badge-status active-badge">Actif</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view-btn">Voir</button>
                                <button class="action-btn edit-btn">Éditer</button>
                                <button class="action-btn delete-btn">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-info">
                                <img src="/api/placeholder/40/40" alt="User">
                                <div>
                                    <div class="user-name">Marc Lefèvre</div>
                                    <div class="user-email">marc.lefevre@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>18/03/2023</td>
                        <td>0</td>
                        <td><span class="badge-status pending-badge">En attente</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view-btn">Voir</button>
                                <button class="action-btn edit-btn">Éditer</button>
                                <button class="action-btn delete-btn">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-info">
                                <img src="/api/placeholder/40/40" alt="User">
                                <div>
                                    <div class="user-name">Émilie Rousseau</div>
                                    <div class="user-email">emilie.rousseau@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td>02/04/2023</td>
                        <td>7</td>
                        <td><span class="badge-status inactive-badge">Inactif</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view-btn">Voir</button>
                                <button class="action-btn edit-btn">Éditer</button>
                                <button class="action-btn delete-btn">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <div class="page-item active">1</div>
            <div class="page-item">2</div>
            <div class="page-item">3</div>
            <div class="page-item">4</div>
            <div class="page-item">5</div>
        </div>
    </div>

    <!-- Modal pour ajouter/éditer un utilisateur -->
    <div class="modal" id="userModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Ajouter un utilisateur</div>
                <button class="close-btn" id="closeModalBtn">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" placeholder="Nom de l'utilisateur">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Email de l'utilisateur">
                </div>
                <div class="form-group">
                    <label class="form-label">Téléphone</label>
                    <input type="tel" class="form-control" placeholder="Numéro de téléphone">
                </div>
                <div class="form-group">
                    <label class="form-label">Adresse</label>
                    <input type="text" class="form-control" placeholder="Adresse de l'utilisateur">
                </div>
                <div class="form-group">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <label class="form-label">Statut</label>
                    <select class="form-control">
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                        <option value="pending">En attente</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="cancel-btn" id="cancelBtn">Annuler</button>
                <button class="save-btn">Enregistrer</button>
            </div>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // Modal functionality
        const modal = document.getElementById('userModal');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelBtn');

        openModalBtn.addEventListener('click', function() {
            modal.classList.add('show');
        });

        closeModalBtn.addEventListener('click', function() {
            modal.classList.remove('show');
        });

        cancelBtn.addEventListener('click', function() {
            modal.classList.remove('show');
        });

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.classList.remove('show');
            }
        });

        // Filter functionality (demo)
        const filters = document.querySelectorAll('.filter');
        filters.forEach(filter => {
            filter.addEventListener('click', function() {
                filters.forEach(f => f.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>