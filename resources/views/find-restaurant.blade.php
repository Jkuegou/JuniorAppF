<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juniorfood - Find Restaurant</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f9f9f9;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            padding: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
            background-color: white;
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

        .nav-link.active {
            color: #ff7000;
            font-weight: 600;
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
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
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

        /* Restaurants Page Specific Styles */
        .hero-section {
            background-color: #fff;
            padding: 40px 0;
            margin-bottom: 40px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .hero-title {
            font-size: 36px;
            color: #333;
            margin-bottom: 15px;
        }

        .hero-description {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
            max-width: 700px;
        }

        .search-form {
            width: 100%;
            max-width: 600px;
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        .search-form-input {
            flex: 1;
            padding: 14px 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
        }

        .search-form-btn {
            padding: 14px 25px;
            background-color: #ff7000;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .search-form-btn:hover {
            background-color: #e06100;
        }

        .filter-bar {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }

        .filter-label {
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }

        .filter-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-tag {
            padding: 8px 15px;
            background-color: #f0f0f0;
            border-radius: 20px;
            font-size: 14px;
            color: #666;
            cursor: pointer;
            transition: all 0.3s;
        }

        .filter-tag:hover {
            background-color: #e0e0e0;
        }

        .filter-tag.active {
            background-color: #ff7000;
            color: white;
        }

        .sort-dropdown {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            background-color: #fff;
        }

        .restaurants-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .restaurant-card {
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .restaurant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .restaurant-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .restaurant-content {
            padding: 20px;
        }

        .restaurant-tags {
            display: flex;
            gap: 8px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .restaurant-tag {
            padding: 4px 10px;
            background-color: #f0f0f0;
            border-radius: 15px;
            font-size: 12px;
            color: #666;
        }

        .restaurant-name {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .restaurant-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .restaurant-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #f8b400;
            font-weight: 500;
        }

        .restaurant-price {
            color: #666;
            font-size: 14px;
        }

        .restaurant-delivery {
            font-size: 14px;
            color: #666;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 15px;
        }

        .restaurant-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .view-menu-btn {
            padding: 8px 15px;
            background-color: #ff7000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .view-menu-btn:hover {
            background-color: #e06100;
        }

        .favorites-btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: #666;
            font-size: 20px;
            transition: color 0.3s;
        }

        .favorites-btn:hover {
            color: #ff7000;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 50px;
        }

        .pagination-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            background-color: #fff;
            color: #666;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .pagination-btn:hover {
            background-color: #f5f5f5;
        }

        .pagination-btn.active {
            background-color: #ff7000;
            color: white;
        }

        .promotion-section {
            background-color: #fff8f2;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .promotion-content {
            flex: 1;
        }

        .promotion-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        .promotion-description {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .promotion-btn {
            padding: 12px 25px;
            background-color: #ff7000;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .promotion-btn:hover {
            background-color: #e06100;
        }

        .promotion-image {
            max-width: 250px;
            border-radius: 10px;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 50px 0 20px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 30px;
        }

        .footer-logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .footer-logo span {
            color: #ff7000;
        }

        .footer-description {
            color: #ccc;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            width: 36px;
            height: 36px;
            background-color: #444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: background-color 0.3s;
        }

        .social-icon:hover {
            background-color: #ff7000;
        }

        .footer-title {
            font-size: 18px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: #ff7000;
        }

        .footer-links {
            list-style: none;
        }

        .footer-link {
            margin-bottom: 15px;
        }

        .footer-link a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-link a:hover {
            color: #ff7000;
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 15px;
            color: #ccc;
        }

        .footer-contact-icon {
            min-width: 20px;
            color: #ff7000;
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #444;
            color: #999;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }

            .nav-links {
                display: none;
            }

            .search-input {
                width: 180px;
            }

            .hero-title {
                font-size: 28px;
            }

            .hero-description {
                font-size: 16px;
            }

            .promotion-section {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .search-container {
                display: none;
            }

            .search-form {
                flex-direction: column;
            }

            .filter-bar {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <div class="logo-text">Junior<span>food</span></div>
                </div>

                <div class="nav-links">
                    <a href="{{ route('find-food') }}" class="nav-link">Find Food</a>
                    <a href="{{ route('tracking') }}" class="nav-link">Tracking</a>
                    <a href="{{ route('location') }}" class="nav-link">Location</a>
                    <a href="{{ route('find-restaurant') }}" class="nav-link">Find Restaurant</a>
                </div>

                <div class="search-cart-profile">
                    <div class="search-container">
                        <span class="search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </span>
                        <input type="text" class="search-input" placeholder="Search">
                    </div>

                    <div class="cart-container">
                        <span class="cart-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </span>
                        <span class="cart-badge">2</span>
                    </div>

                    
                    <div class="profile-container">
                        <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80"
                            alt="Profile" class="profile-img" id="profileImg">
                        <div class="profile-dropdown" id="profileDropdown">
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Admin Dashboard</a>
                                @else
                                    <a href="{{ route('user.dashboard') }}" class="dropdown-item">User Dashboard</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <!-- This is the correct way to create a logout button with Laravel Breeze -->
                                {{-- <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a type="submit" class="dropdown-item text-left w-full">
                                        Logout
                                    </a>
                                </form> --}}
                                <form method="POST" action="{{ route('logout') }}" class="mt-2 w-full">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm w-full text-left">
                                        <i class="fas fa-sign-out-alt mr-1"></i> Déconnexion
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                                <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Find Your Favorite Restaurant</h1>
                <p class="hero-description">Discover restaurants with delicious food near you. We have thousands of options for you to choose from.</p>
                <form class="search-form">
                    <input type="text" placeholder="Search by restaurant name, cuisine type..." class="search-form-input">
                    <button type="submit" class="search-form-btn">Search</button>
                </form>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="filter-bar">
            <span class="filter-label">Categories:</span>
            <div class="filter-group">
                <div class="filter-tag active">All</div>
                <div class="filter-tag">Fast Food</div>
                <div class="filter-tag">Healthy</div>
                <div class="filter-tag">Italian</div>
                <div class="filter-tag">Asian</div>
                <div class="filter-tag">Mexican</div>
                <div class="filter-tag">Desserts</div>
            </div>
            <div style="margin-left: auto; display: flex; align-items: center; gap: 10px;">
                <span class="filter-label">Sort by:</span>
                <select class="sort-dropdown">
                    <option>Relevance</option>
                    <option>Rating</option>
                    <option>Delivery Time</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                </select>
            </div>
        </div>

        <div class="restaurants-grid">
            <!-- Restaurant Card 1 -->
            <div class="restaurant-card">
                <img src="https://images.unsplash.com/photo-1554679665-f5537f187268" alt="Restaurant" class="restaurant-image">
                <div class="restaurant-content">
                    <div class="restaurant-tags">
                        <span class="restaurant-tag">Burger</span>
                        <span class="restaurant-tag">Fast Food</span>
                    </div>
                    <h3 class="restaurant-name">Burger House</h3>
                    <div class="restaurant-details">
                        <div class="restaurant-rating">
                            <i class="fas fa-star"></i>
                            <span>4.8</span>
                            <span>(230+)</span>
                        </div>
                        <div class="restaurant-price">$$$</div>
                    </div>
                    <div class="restaurant-delivery">
                        <i class="fas fa-clock"></i>
                        <span>20-30 min</span>
                    </div>
                    <div class="restaurant-actions">
                        <button class="view-menu-btn">View Menu</button>
                        <button class="favorites-btn">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Restaurant Card 2 -->
            <div class="restaurant-card">
                <img src="https://images.unsplash.com/photo-1593504049359-74330189a345" alt="Restaurant" class="restaurant-image">
                <div class="restaurant-content">
                    <div class="restaurant-tags">
                        <span class="restaurant-tag">Pizza</span>
                        <span class="restaurant-tag">Italian</span>
                    </div>
                    <h3 class="restaurant-name">Pizza Express</h3>
                    <div class="restaurant-details">
                        <div class="restaurant-rating">
                            <i class="fas fa-star"></i>
                            <span>4.6</span>
                            <span>(180+)</span>
                        </div>
                        <div class="restaurant-price">$$</div>
                    </div>
                    <div class="restaurant-delivery">
                        <i class="fas fa-clock"></i>
                        <span>25-35 min</span>
                    </div>
                    <div class="restaurant-actions">
                        <button class="view-menu-btn">View Menu</button>
                        <button class="favorites-btn">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Restaurant Card 3 -->
            <div class="restaurant-card">
                <img src="https://images.unsplash.com/photo-1551632436-cbf8dd35adfa" alt="Restaurant" class="restaurant-image">
                <div class="restaurant-content">
                    <div class="restaurant-tags">
                        <span class="restaurant-tag">Sushi</span>
                        <span class="restaurant-tag">Asian</span>
                    </div>
                    <h3 class="restaurant-name">Sushi Deluxe</h3>
                    <div class="restaurant-details">
                        <div class="restaurant-rating">
                            <i class="fas fa-star"></i>
                            <span>4.9</span>
                            <span>(320+)</span>
                        </div>
                        <div class="restaurant-price">$$$$</div>
                    </div>
                    <div class="restaurant-delivery">
                        <i class="fas fa-clock"></i>
                        <span>30-40 min</span>
                    </div>
                    <div class="restaurant-actions">
                        <button class="view-menu-btn">View Menu</button>
                        <button class="favorites-btn">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Restaurant Card 4 -->
            <div class="restaurant-card">
                <img src="https://images.unsplash.com/photo-1530016555861-3d1f3f5ca94b" alt="Restaurant" class="restaurant-image">
                <div class="restaurant-content">
                    <div class="restaurant-tags">
                        <span class="restaurant-tag">Mexican</span>
                        <span class="restaurant-tag">Spicy</span>
                    </div>
                    <h3 class="restaurant-name">Taco Fiesta</h3>
                    <div class="restaurant-details">
                        <div class="restaurant-rating">
                            <i class="fas fa-star"></i>
                            <span>4.7</span>
                            <span>(150+)</span>
                        </div>
                        <div class="restaurant-price">$$</div>
                    </div>
                    <div class="restaurant-delivery">
                        <i class="fas fa-clock"></i>
                        <span>20-30 min</span>
                    </div>
                    <div class="restaurant-actions">
                        <button class="view-menu-btn">View Menu</button>
                        <button class="favorites-btn">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Restaurant Card 5 -->
            <div class="restaurant-card">
                <img src="https://images.unsplash.com/photo-1544025162-d76694265947" alt="Restaurant" class="restaurant-image">
                <div class="restaurant-content">
                    <div class="restaurant-tags">
                        <span class="restaurant-tag">Salad</span>
                        <span class="restaurant-tag">Healthy</span>
                    </div>
                    <h3 class="restaurant-name">Green Garden</h3>
                    <div class="restaurant-details">
                        <div class="restaurant-rating">
                            <i class="fas fa-star"></i>
                            <span>4.5</span>
                            <span>(120+)</span>
                        </div>
                        <div class="restaurant-price">$$</div>
                    </div>
                    <div class="restaurant-delivery">
                        <i class="fas fa-clock"></i>
                        <span>15-25 min</span>
                    </div>
                    <div class="restaurant-actions">
                        <button class="view-menu-btn">View Menu</button>
                        <button class="favorites-btn">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Restaurant Card 6 -->
            <div class="restaurant-card">
                <img src="https://images.unsplash.com/photo-1598515214211-89d3c73ae83b" alt="Restaurant" class="restaurant-image">
                <div class="restaurant-content">
                    <div class="restaurant-tags">
                        <span class="restaurant-tag">Indian</span>
                        <span class="restaurant-tag">Curry</span>
                    </div>
                    <h3 class="restaurant-name">Spice Junction</h3>
                    <div class="restaurant-details">
                        <div class="restaurant-rating">
                            <i class="fas fa-star"></i>
                            <span>4.8</span>
                            <span>(200+)</span>
                        </div>
                        <div class="restaurant-price">$$$</div>
                    </div>
                    <div class="restaurant-delivery">
                        <i class="fas fa-clock"></i>
                        <span>30-40 min</span>
                    </div>
                    <div class="restaurant-actions">
                        <button class="view-menu-btn">View Menu</button>
                        <button class="favorites-btn">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagination">
            <div class="pagination-btn"><i class="fas fa-angle-left"></i></div>
            <div class="pagination-btn active">1</div>
            <div class="pagination-btn">2</div>
            <div class="pagination-btn">3</div>
            <div class="pagination-btn">4</div>
            <div class="pagination-btn"><i class="fas fa-angle-right"></i></div>
        </div>

        <div class="promotion-section">
            <div class="promotion-content">
                <h2 class="promotion-title">Become a Partner Restaurant</h2>
                <p class="promotion-description">Join our platform and reach thousands of hungry customers in your area. Increase your sales and grow your business with Juniorfood.</p>
                <button class="promotion-btn">Apply Now</button>
            </div>
            <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9" alt="Partner with us" class="promotion-image">
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-column">
                    <div class="footer-logo">Junior<span>food</span></div>
                    <p class="footer-description">The fastest and favorite food delivery service all over the world. Find your favorite food with just a few clicks.</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li class="footer-link"><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li class="footer-link"><a href="#"><i class="fas fa-chevron-right"></i> Services</a></li>
                        <li class="footer-link"><a href="#"><i class="fas fa-chevron-right"></i> Restaurants</a></li>
                        <li class="footer-link"><a href="#"><i class="fas fa-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-title">Support</h3>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#"><i class="fas fa-chevron-right"></i> FAQ</a></li>
                        <li class="footer-link"><a href="#"><i class="fas fa-chevron-right"></i> Terms of Service</a></li>
                        <li class="footer-link"><a href="#"><i class="fas fa-chevron-right"></i> Privacy Policy</a></li>
                        <li class="footer-link"><a href="#"><i class="fas fa-chevron-right"></i> Contact Support</a></li>
                        <li class="footer-link"><a href="#"><i class="fas fa-chevron-right"></i> Report a Bug</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-title">Contact Us</h3>
                    <div class="footer-contact-item">
                        <i class="fas fa-map-marker-alt footer-contact-icon"></i>
                        <span>123 Restaurant Street, Food City, FC 12345</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-phone-alt footer-contact-icon"></i>
                        <span>+1 234 567 8900</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-envelope footer-contact-icon"></i>
                        <span>info@juniorfood.com</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-clock footer-contact-icon"></i>
                        <span>Mon - Sun: 24/7 Available</span>
                    </div>
                </div>
            </div>
            <div class="copyright">
                &copy; 2025 Juniorfood. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script>
        // Check if user is admin or regular user
        const isAdmin = false; // Set this based on your authentication logic

        // Toggle dashboard button text
        document.addEventListener('DOMContentLoaded', function () {
            const dashboardText = document.getElementById('dashboard-text');
            const adminDashboard = document.getElementById('admin-dashboard');

            if (isAdmin) {
                dashboardText.style.display = 'none';
                adminDashboard.style.display = 'inline';
            }
        });

        // Function to toggle menu items if needed
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }


        // Add hover effect for navigation links
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(link => {
            link.addEventListener('mouseenter', () => {
                link.style.color = '#ff7000';
            });

            link.addEventListener('mouseleave', () => {
                link.style.color = '';
            });
        });

        // Add functionality to cart icon
        const cartIcon = document.querySelector('.cart-container');

        cartIcon.addEventListener('click', () => {
            alert('Shopping cart clicked!');
        });

        // Add search functionality
        const searchInput = document.querySelector('.search-input');

        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                alert(`Searching for: ${searchInput.value}`);
            }
        });

        // Add this to your existing JavaScript section
document.addEventListener('DOMContentLoaded', function() {
    // Profile dropdown functionality
    const profileImg = document.getElementById('profileImg');
    const profileDropdown = document.getElementById('profileDropdown');

    profileImg.addEventListener('click', () => {
        profileDropdown.classList.toggle('active');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!profileImg.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.remove('active');
        }
    });

    // IMPORTANT: Remove or modify the event listeners for dropdown items
    // This part is causing your logout button not to work properly
    
    /* Remove or comment out this entire section:
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    dropdownItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault(); // This prevents the form submission!
            
            if (item.textContent === 'User Dashboard') {
                alert('Navigating to User Dashboard');
                window.location.href = 'login';
            } else if (item.textContent === 'Logout') {
                alert('Logging out...');
                window.location.href = '/login';
            }

            profileDropdown.classList.remove('active');
        });
    });
    */
    
    // Instead, handle only specific dropdown items that should NOT submit forms
    const dashboardLink = document.querySelector('.dropdown-item:not(form .dropdown-item)');
    if (dashboardLink) {
        dashboardLink.addEventListener('click', () => {
            profileDropdown.classList.remove('active');
        });
    }
});
    </script>
</body>
</html>