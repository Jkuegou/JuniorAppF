<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu - JuniorMarket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #f8f9fc;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 20px;
            font-weight: 700;
            color: #333;
            text-decoration: none;
        }
        
        .logo-icon {
            width: 32px;
            height: 32px;
            background-color: #ff6b00;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        
        .nav-links {
            display: flex;
            gap: 30px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        
        .nav-links a.active {
            color: #ff6b00;
            position: relative;
        }
        
        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #ff6b00;
        }
        
        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box input {
            padding: 10px 15px;
            padding-left: 40px;
            border-radius: 30px;
            border: 1px solid #eee;
            background-color: white;
            width: 200px;
            outline: none;
        }
        
        .search-box::before {
            content: '🔍';
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }
        
        .cart-icon {
            position: relative;
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .cart-badge {
            position: absolute;
            top: 0;
            right: 0;
            width: 18px;
            height: 18px;
            background-color: #ff6b00;
            border-radius: 50%;
            color: white;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .page-header {
            text-align: center;
            margin: 40px 0;
        }
        
        .page-title {
            font-size: 36px;
            font-weight: 700;
            color: #1e2959;
        }
        
        .category-tabs {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .category-tab {
            padding: 10px 20px;
            border: none;
            background: none;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            color: #777;
            position: relative;
        }
        
        .category-tab.active {
            color: #ff6b00;
        }
        
        .category-tab.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 3px;
            background-color: #ff6b00;
            border-radius: 3px;
        }
        
        .food-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .food-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .food-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .food-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        
        .food-info {
            padding: 20px;
        }
        
        .food-name {
            font-size: 18px;
            font-weight: 600;
            color: #1e2959;
            margin-bottom: 5px;
        }
        
        .food-description {
            font-size: 14px;
            color: #777;
            margin-bottom: 15px;
            height: 40px;
            overflow: hidden;
        }
        
        .food-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .food-price {
            font-size: 18px;
            font-weight: 700;
            color: #ff6b00;
        }
        
        .add-to-cart {
            width: 36px;
            height: 36px;
            background-color: #ff6b00;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }
        
        .add-to-cart:hover {
            background-color: #e65e00;
        }
        
        .food-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
        }
        
        .stars {
            color: #ffb800;
            font-size: 14px;
        }
        
        .rating-count {
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <a href="index.html" class="logo">
                <div class="logo-icon">J</div>
                JuniorMarket
            </a>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="{{ route('menu') }}" class="active">Menu</a>
                <a href="{{ route('service') }}"> Service</a>
                <a href="{{ route('shop') }}">Shop</a>
            </div>
            <div class="nav-right">
                <div class="search-box">
                    <input type="text" placeholder="Search">
                </div>
                <a href="{{ route('cart') }}" class="cart-icon">
                    <span>🛒</span>
                    <div class="cart-badge">3</div>
                </a>
            </div>
        </nav>
        
        <div class="page-header">
            <h1 class="page-title">Our Menu</h1>
        </div>
        
        <div class="category-tabs">
            <button class="category-tab active">All</button>
            <button class="category-tab">Breakfast</button>
            <button class="category-tab">Lunch</button>
            <button class="category-tab">Dinner</button>
            <button class="category-tab">Desserts</button>
            <button class="category-tab">Drinks</button>
        </div>
        
        <div class="food-grid">
            <!-- Breakfast Items -->
            <div class="food-card" data-category="breakfast">
                <img src="https://images.unsplash.com/photo-1588137378633-dea1336ce1e2?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Avocado Toast" class="food-image">
                <div class="food-info">
                    <div class="food-rating">
                        <div class="stars">★★★★★</div>
                        <span class="rating-count">(42)</span>
                    </div>
                    <h3 class="food-name">Avocado Toast</h3>
                    <p class="food-description">Smashed avocado on toasted artisan bread with poached eggs.</p>
                    <div class="food-meta">
                        <div class="food-price">$12.99</div>
                        <button class="add-to-cart">+</button>
                    </div>
                </div>
            </div>
            
            <div class="food-card" data-category="breakfast" >
                <img src="https://images.unsplash.com/photo-1575831967553-771b0db4f7c1?q=80&w=2036&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Pancake Stack" class="food-image">
                <div class="food-info">
                    <div class="food-rating">
                        <div class="stars">★★★★☆</div>
                        <span class="rating-count">(37)</span>
                    </div>
                    <h3 class="food-name">Pancake Stack</h3>
                    <p class="food-description">Fluffy pancakes served with maple syrup and fresh berries.</p>
                    <div class="food-meta">
                        <div class="food-price">$10.99</div>
                        <button class="add-to-cart">+</button>
                    </div>
                </div>
            </div>
            
            <!-- Lunch Items -->
            <div class="food-card" data-category="lunch" >
                <img src="https://media.istockphoto.com/id/185275317/photo/chicken-caesar-salad.jpg?s=1024x1024&w=is&k=20&c=OV_3H023cHDL04pGTYpK5kL_xbzFztgvflMPGa-L8ic=" alt="Chicken Caesar Salad" class="food-image" >
                <div class="food-info">
                    <div class="food-rating">
                        <div class="stars">★★★★★</div>
                        <span class="rating-count">(56)</span>
                    </div>
                    <h3 class="food-name">Chicken Caesar Salad</h3>
                    <p class="food-description">Fresh romaine lettuce with grilled chicken, parmesan and croutons.</p>
                    <div class="food-meta">
                        <div class="food-price">$14.99</div>
                        <button class="add-to-cart">+</button>
                    </div>
                </div>
            </div>
            
            <div class="food-card" data-category="lunch" >
                <img src="https://images.unsplash.com/photo-1606131731446-5568d87113aa?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" style="width: 100%; height: 35%;">
                <div class="food-info">
                    <div class="food-rating">
                        <div class="stars">★★★★★</div>
                        <span class="rating-count">(78)</span>
                    </div>
                    <h3 class="food-name">Beef Burger</h3>
                    <p class="food-description">Premium beef patty with cheese, lettuce, tomato and special sauce.</p>
                    <div class="food-meta">
                        <div class="food-price">$16.99</div>
                        <button class="add-to-cart">+</button>
                    </div>
                </div>
            </div>
            
            <!-- Dinner Items -->
            <div class="food-card" data-category="dinner" >
                <img src="https://media.istockphoto.com/id/587207508/photo/sliced-grilled-steak-ribeye-with-herb-butter.jpg?s=1024x1024&w=is&k=20&c=Huz6w1foEuq-U2oyHpuIhZKCcH1uf0XAmRJ5V9f5WJE=" alt="Steak Frites" class="food-image">
                <div class="food-info">
                    <div class="food-rating">
                        <div class="stars">★★★★★</div>
                        <span class="rating-count">(62)</span>
                    </div>
                    <h3 class="food-name">Steak Frites</h3>
                    <p class="food-description">Grilled ribeye steak with herb butter and crispy fries.</p>
                    <div class="food-meta">
                        <div class="food-price">$24.99</div>
                        <button class="add-to-cart">+</button>
                    </div>
                </div>
            </div>
            
            <div class="food-card" data-category="dinner" >
                <img src="https://media.istockphoto.com/id/142336977/photo/glazed-salmon.jpg?s=1024x1024&w=is&k=20&c=zZqC1a7jArlbxRPunvErFTWQGt3czpM8epNh6Gf5SO8=" alt="Salmon Teriyaki" class="food-image">
                <div class="food-info">
                    <div class="food-rating">
                        <div class="stars">★★★★☆</div>
                        <span class="rating-count">(43)</span>
                    </div>
                    <h3 class="food-name">Salmon Teriyaki</h3>
                    <p class="food-description">Grilled salmon glazed with teriyaki sauce, served with rice and vegetables.</p>
                    <div class="food-meta">
                        <div class="food-price">$22.99</div>
                        <button class="add-to-cart">+</button>
                    </div>
                </div>
            </div>
            
            <!-- Dessert Items -->
            <div class="food-card" data-category="desserts" >
                <img src="https://media.istockphoto.com/id/497895949/photo/lava-cake.jpg?s=1024x1024&w=is&k=20&c=tKymNdwMdNuuzUVDfNB8ZcQka0J7EoiBRAqy96g-uIE=" alt="Chocolate Lava Cake" class="food-image">
                <div class="food-info">
                    <div class="food-rating">
                        <div class="stars">★★★★★</div>
                        <span class="rating-count">(84)</span>
                    </div>
                    <h3 class="food-name">Chocolate Lava Cake</h3>
                    <p class="food-description">Warm chocolate cake with a molten center, served with ice cream.</p>
                    <div class="food-meta">
                        <div class="food-price">$9.99</div>
                        <button class="add-to-cart">+</button>
                    </div>
                </div>
            </div>
            
            <div class="food-card" data-category="desserts" >
                <img src="https://i.pinimg.com/736x/d0/30/72/d03072651e51899a770a380dd60b80a5.jpg" alt="New York Cheesecake" class="food-image">
                <div class="food-info">
                    <div class="food-rating">
                        <div class="stars">★★★★☆</div>
                        <span class="rating-count">(52)</span>
                    </div>
                    <h3 class="food-name">New York Cheesecake</h3>
                    <p class="food-description">Classic creamy cheesecake with a graham cracker crust and berry compote.</p>
                    <div class="food-meta">
                        <div class="food-price">$8.99</div>
                        <button class="add-to-cart">+</button>
                    </div>
                </div>
            </div>
            
            <!-- Drinks Items -->
            <div class="food-card" data-category="drinks" >
                <img src="https://i.pinimg.com/736x/43/ec/de/43ecde551a1e28d7c84861e7ee93e833.jpg" alt="Mango Smoothie" class="food-image">
                <div class="food-info">
                    <div class="food-rating">
                        <div class="stars">★★★★★</div>
                        <span class="rating-count">(39)</span>
                    </div>
                    <h3 class="food-name">Mango Smoothie</h3>
                    <p class="food-description">Fresh mango blended with yogurt and honey.</p>
                    <div class="food-meta">
                        <div class="food-price">$6.99</div>
                        <button class="add-to-cart">+</button>
                    </div>
                </div>
            </div>
            
            <div class="food-card" data-category="drinks" >
                <img src="https://i.pinimg.com/736x/c7/b9/42/c7b94245341f6fb91bd6e02c732dc970.jpg" alt="Iced Coffee" class="food-image">
                <div class="food-info">
                    <div class="food-rating">
                        <div class="stars">★★★★☆</div>
                        <span class="rating-count">(48)</span>
                    </div>
                    <h3 class="food-name">Iced Coffee</h3>
                    <p class="food-description">Cold brewed coffee served over ice with cream and syrup.</p>
                    <div class="food-meta">
                        <div class="food-price">$4.99</div>
                        <button class="add-to-cart">+</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-container">
            {{-- <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80"
                alt="Profile" class="profile-img" id="profileImg"> --}}
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

    <script>
        // Simple tab functionality
        const tabs = document.querySelectorAll('.category-tab');
        const foodCards = document.querySelectorAll('.food-card');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Update active tab
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                // Filter food items based on category
                const category = tab.textContent.toLowerCase();
                
                if (category === 'all') {
                    // Show all food cards
                    foodCards.forEach(card => {
                        card.style.display = 'block';
                    });
                } else {
                    // Show only cards with matching category
                    foodCards.forEach(card => {
                        if (card.getAttribute('data-category') === category) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                }
            });
        });
        
        // Add to cart functionality
        const addToCartButtons = document.querySelectorAll('.add-to-cart');
        const cartBadge = document.querySelector('.cart-badge');
        let cartCount = 3; // Starting count from the HTML
        
        addToCartButtons.forEach(button => {
            button.addEventListener('click', () => {
                cartCount++;
                cartBadge.textContent = cartCount;
                
                // Optional: Show a little animation or feedback
                button.textContent = '✓';
                setTimeout(() => {
                    button.textContent = '+';
                }, 500);
            });
        });
    </script>
</body>
</html>