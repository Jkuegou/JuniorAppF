<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juniorfood - Online Food Junior</title>
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

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo h1 {
            color: #333;
            font-size: 24px;
            font-weight: 700;
        }

        .logo span {
            color: #ff6b00;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
            font-size: 16px;
        }

        .nav-links a:hover {
            color: #ff6b00;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            display: flex;
            align-items: center;
            background-color: #f5f5f5;
            padding: 8px 15px;
            border-radius: 50px;
            width: 250px;
        }

        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            width: 100%;
            padding: 5px;
            font-size: 14px;
        }

        .nav-right .btn {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .dashboard-btn {
            background-color: #f5f5f5;
            color: #333;
            padding: 8px 15px;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
            font-size: 14px;
        }

        .dashboard-btn:hover {
            background-color: #e5e5e5;
        }

        .cart-btn {
            background-color: #fff;
            color: #333;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .cart-btn:hover {
            background-color: #ff6b00;
            color: #fff;
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ff6b00;
            color: #fff;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
        }

        /* Hero Section Styles */
        .hero {
            padding: 50px 0;
            position: relative;
            min-height: 550px;
        }

        .hero-content {
            width: 50%;
            padding: 30px 0;
        }

        .hero h1 {
            font-size: 64px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.1;
        }

        .hero h1 .fastest {
            color: #ff6b00;
        }

        .hero h1 .online {
            color: #333;
        }

        .hero h1 .food {
            color: #333;
        }

        .hero h1 .Junior {
            color: #ff6b00;
        }

        .hero h1 .service {
            color: #333;
        }

        .hero p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
            max-width: 90%;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .primary-btn {
            background-color: #333;
            color: #fff;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 16px;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .primary-btn:hover {
            background-color: #222;
            transform: translateY(-2px);
        }

        .secondary-btn {
            background-color: transparent;
            color: #333;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 16px;
            border: 1px solid #ddd;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .secondary-btn:hover {
            border-color: #999;
            background-color: #f5f5f5;
        }

        .features {
            display: flex;
            gap: 40px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background-color: #fff4e8;
            color: #ff6b00;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature p {
            color: #666;
            font-size: 14px;
            margin-bottom: 0;
        }

        .hero-image {
            position: absolute;
            top: 0;
            right: -100px;
            width: 60%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image img {
            max-width: 100%;
            border-radius: 20px;
        }

        .yellow-circle {
            position: absolute;
            width: 600px;
            height: 600px;
            background-color: #ffdd80;
            border-radius: 50%;
            z-index: -1;
            top: 50%;
            right: 50px;
            transform: translateY(-50%);
        }

        .food-item {
            position: absolute;
            width: 100px;
            height: 100px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .food-item img {
            width: 70%;
            height: auto;
        }

        .food-item:nth-child(1) {
            top: 20%;
            right: 20%;
        }

        .food-item:nth-child(2) {
            top: 70%;
            right: 30%;
        }

        .food-item:nth-child(3) {
            top: 40%;
            right: 0;
        }

        .food-item .cart-icon {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 30px;
            height: 30px;
            background-color: #333;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .wave-path {
            position: absolute;
            top: 30%;
            left: 40%;
            width: 200px;
            z-index: -1;
        }

        .customers {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 20px;
        }

        .customer-title {
            font-size: 16px;
            color: #666;
        }

        .customer-avatars {
            display: flex;
        }

        .customer-avatars img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
            margin-left: -10px;
        }

        .customer-avatars img:first-child {
            margin-left: 0;
        }

        .customer-count {
            width: 40px;
            height: 40px;
            background-color: #f5f5f5;
            color: #666;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
            margin-left: -10px;
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .hero-content {
                width: 60%;
            }

            .hero h1 {
                font-size: 50px;
            }

            .yellow-circle {
                width: 500px;
                height: 500px;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero-content {
                width: 100%;
            }

            .hero-image {
                position: relative;
                width: 100%;
                right: 0;
                margin-top: 40px;
            }

            .yellow-circle {
                width: 400px;
                height: 400px;
                right: -100px;
            }

            .hero p {
                max-width: 100%;
            }

            .features {
                flex-direction: column;
                gap: 20px;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 36px;
            }

            .yellow-circle {
                width: 300px;
                height: 300px;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 10px;
            }

            .primary-btn,
            .secondary-btn {
                width: 100%;
                text-align: center;
            }

            .search-box {
                display: none;
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }


        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
            background-color: white;
            /* box-shadow: 0 2px 5px rgba(0,0,0,0.1); */
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

        /* Profile styles */
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

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>
                    <span class="fastest">Fastest</span> <span class="online">Online</span><br>
                    <span class="food">Food</span> <span class="Junior">Junior</span><br>
                    <span class="service">Service</span>
                </h1>

                <p>We are most fastest and favourite food delivery service all over the world. Search for your favourite
                    food or restaurant in your area.</p>

                <div class="hero-buttons">
                    <a href="{{ route('payment.index') }}" class="primary-btn">Order Now</a>
                    <a href="#" class="secondary-btn">See Menu</a>
                </div>

                <div class="features">
                    <div class="feature">
                        <div class="feature-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <p>No shipping Charge</p>
                    </div>

                    <div class="feature">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <p>100% Secure Checkout</p>
                    </div>
                </div>

                <div class="customers">
                    <p class="customer-title">Our customer</p>
                    <div class="customer-avatars">
                        <img src="/api/placeholder/40/40" alt="Customer">
                        <img src="/api/placeholder/40/40" alt="Customer">
                        <img src="/api/placeholder/40/40" alt="Customer">
                        <img src="/api/placeholder/40/40" alt="Customer">
                        <div class="customer-count">2k+</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-image">
            <div class="yellow-circle"></div>
            <img src="https://i.pinimg.com/736x/f0/84/f7/f084f7f84a56ed31f9bf5a9fb7a1eab2.jpg" alt="Junior Person">

            <div class="food-item" style="top: 20%; right: 20%;">
                <img src="https://i.pinimg.com/736x/aa/f3/aa/aaf3aa4e15769c860aff8b2a22edfc78.jpg" alt="Burger">
                <div class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>

            <div class="food-item" style="top: 70%; right: 30%;">
                <img src="https://i.pinimg.com/736x/f9/00/7f/f9007f73da46783cb255a1e621637f27.jpg" alt="Pizza">
                <div class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>

            <div class="food-item" style="top: 40%; right: 0%;">
                <img src="https://i.pinimg.com/736x/32/0e/0f/320e0f6fd9c79c82147d496f48ae83f5.jpg" alt="Hot Dog">
                <div class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>

        <svg class="wave-path" viewBox="0 0 200 100" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,0 C50,40 80,-30 100,20 C120,80 150,10 200,40" fill="none" stroke="#ff6b00" stroke-width="3"
                stroke-dasharray="5,5" />
            <circle cx="200" cy="40" r="5" fill="#ff6b00" />
        </svg>
    </section>

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