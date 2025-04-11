<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JuniorMarket - Location</title>
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

        /* Location Page Specific Styles */
        .page-title {
            text-align: center;
            margin: 30px 0;
            font-size: 32px;
            color: #333;
        }

        .location-container {
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
        }

        .location-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }

        .form-input {
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
        }

        .form-input:focus {
            border-color: #ff7000;
        }

        .form-select {
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            background-color: white;
        }

        .location-btn {
            padding: 14px 25px;
            background-color: #ff7000;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
            margin-top: 10px;
            align-self: flex-start;
        }

        .location-btn:hover {
            background-color: #e06100;
        }

        .map-container {
            margin-top: 30px;
            border-radius: 15px;
            overflow: hidden;
            height: 400px;
            background-color: #eee;
            position: relative;
        }

        .map-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 15px;
            color: #666;
        }

        .map-placeholder i {
            font-size: 48px;
            color: #999;
        }

        .saved-locations {
            margin-top: 40px;
        }

        .locations-title {
            font-size: 22px;
            color: #333;
            margin-bottom: 20px;
        }

        .locations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .location-card {
            background-color: #f5f5f5;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .location-type {
            font-size: 14px;
            color: #ff7000;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .location-address {
            font-size: 16px;
            color: #333;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .location-details {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .location-actions {
            display: flex;
            gap: 15px;
        }

        .location-action {
            font-size: 14px;
            color: #333;
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .location-action:hover {
            color: #ff7000;
        }

        .default-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #E3FCF4;
            color: #00B69B;
            font-size: 12px;
            font-weight: 500;
            padding: 4px 8px;
            border-radius: 4px;
        }

        /* Footer */
        footer {
            background-color: #333;
            padding: 50px 0 20px;
            color: #fff;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 18px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background-color: #ff7000;
        }

        .footer-column p {
            margin-bottom: 15px;
            color: #bbb;
            font-size: 14px;
            line-height: 1.6;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #bbb;
            text-decoration: none;
            transition: color 0.3s;
            font-size: 14px;
        }

        .footer-links a:hover {
            color: #ff7000;
        }

        .download-apps {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .app-btn {
            background-color: #444;
            border-radius: 5px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s;
        }

        .app-btn:hover {
            background-color: #555;
        }

        .app-icon {
            font-size: 20px;
            margin-right: 8px;
        }

        .app-text {
            display: flex;
            flex-direction: column;
        }

        .app-text small {
            font-size: 10px;
            opacity: 0.8;
        }

        .app-text span {
            font-size: 14px;
            font-weight: 500;
        }

        .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #bbb;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .footer-content {
                grid-template-columns: 1fr 1fr;
            }
            
            .locations-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }
            
            .search-input {
                width: 180px;
            }
            
            .locations-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .footer-content {
                grid-template-columns: 1fr;
            }
            
            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                       <a href="{{ route('dashboard') }}" >
                 <div class="logo-text">Junior<span>Maket</span></div>
                </a>
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

    <div class="container">
        <h1 class="page-title">Set Your Delivery Location</h1>
        
        <div class="location-container">
            <div class="location-form">
                <div class="form-group">
                    <label class="form-label">Location Type</label>
                    <select class="form-select">
                        <option value="home">Home</option>
                        <option value="work">Work</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Address Line 1</label>
                    <input type="text" class="form-input" placeholder="Street address or P.O. Box">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Address Line 2</label>
                    <input type="text" class="form-input" placeholder="Apt, suite, unit, building, floor, etc.">
                </div>
                
                <div class="form-group">
                    <label class="form-label">City</label>
                    <input type="text" class="form-input" placeholder="City">
                </div>
                
                <div class="form-group">
                    <label class="form-label">State/Province</label>
                    <input type="text" class="form-input" placeholder="State/Province">
                </div>
                
                <div class="form-group">
                    <label class="form-label">ZIP/Postal Code</label>
                    <input type="text" class="form-input" placeholder="ZIP or Postal Code">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Additional Instructions</label>
                    <input type="text" class="form-input" placeholder="Delivery instructions, landmarks, door code, etc.">
                </div>
                
                <button class="location-btn">Save Location</button>
            </div>
            
            <div class="map-container">
                <div class="map-placeholder">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Enter your address to see it on the map</p>
                </div>
            </div>
            
            <div class="saved-locations">
                <h2 class="locations-title">Your Saved Locations</h2>
                <div class="locations-grid">
                    <div class="location-card">
                        <div class="default-badge">Default</div>
                        <div class="location-type">Home</div>
                        <div class="location-address">123 Main Street, Apt 4B</div>
                        <div class="location-details">New York, NY 10001</div>
                        <div class="location-actions">
                            <button class="location-action">
                                <i class="fas fa-pen"></i> Edit
                            </button>
                            <button class="location-action">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                    
                    <div class="location-card">
                        <div class="location-type">Work</div>
                        <div class="location-address">456 Office Plaza, Suite 200</div>
                        <div class="location-details">New York, NY 10016</div>
                        <div class="location-actions">
                            <button class="location-action">
                                <i class="fas fa-pen"></i> Edit
                            </button>
                            <button class="location-action">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            <button class="location-action">
                                <i class="fas fa-check-circle"></i> Set as Default
                            </button>
                        </div>
                    </div>
                    
                    <div class="location-card">
                        <div class="location-type">Other</div>
                        <div class="location-address">789 Gym Center</div>
                        <div class="location-details">Brooklyn, NY 11201</div>
                        <div class="location-actions">
                            <button class="location-action">
                                <i class="fas fa-pen"></i> Edit
                            </button>
                            <button class="location-action">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            <button class="location-action">
                                <i class="fas fa-check-circle"></i> Set as Default
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>About JuniorMarket</h3>
                    <p>JuniorMarket is the fastest food delivery service connecting customers with their favorite restaurants all over the world.</p>
                    <p>With our easy-to-use app, you can order delicious meals delivered right to your doorstep within minutes.</p>
                </div>
                
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">How it Works</a></li>
                        <li><a href="#">Track Your Order</a></li>
                        <li><a href="#">Restaurants</a></li>
                        <li><a href="#">Become a Partner</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Support</h3>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Download App</h3>
                    <p>Get the best food delivery experience with our app.</p>
                    <div class="download-apps">
                        <a href="#" class="app-btn">
                            <i class="fab fa-apple app-icon"></i>
                            <div class="app-text">
                                <small>Download on the</small>
                                <span>App Store</span>
                            </div>
                        </a>
                        <a href="#" class="app-btn">
                            <i class="fab fa-google-play app-icon"></i>
                            <div class="app-text">
                                <small>Get it on</small>
                                <span>Google Play</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 JuniorMarket. All rights reserved.</p>
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