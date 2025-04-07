<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juniorfood - Shop</title>
    <!-- Fonts -->
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
            overflow-x: hidden;
            position: relative;
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
            padding: 40px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .page-title h1 {
            font-size: 36px;
            color: #1e2959;
            margin-bottom: 10px;
        }
        
        .page-title p {
            color: #777;
        }
        
        .filter-dropdown {
            position: relative;
        }
        
        .filter-btn {
            background-color: white;
            border: 1px solid #eee;
            padding: 10px 20px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .shop-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .product-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
        }
        
        .product-image {
            height: 200px;
            width: 100%;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .product-details {
            padding: 20px;
        }
        
        .product-category {
            font-size: 12px;
            color: #777;
            margin-bottom: 5px;
        }
        
        .product-title {
            font-size: 18px;
            font-weight: 600;
            color: #1e2959;
            margin-bottom: 10px;
        }
        
        .product-price {
            font-size: 18px;
            font-weight: 700;
            color: #ff6b00;
            margin-bottom: 15px;
        }
        
        .product-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .add-to-cart {
            background-color: #ff6b00;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .add-to-cart:hover {
            background-color: #e65e00;
        }
        
        .wishlist-btn {
            width: 35px;
            height: 35px;
            background-color: #f8f9fc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 50px 0;
        }
        
        .page-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: white;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .page-link.active {
            background-color: #ff6b00;
            color: white;
        }
        
        .page-link:hover:not(.active) {
            background-color: #f0f0f0;
        }
        
        .colored-dots {
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }
        
        .dot-1 {
            background-color: #ffb800;
            top: 100px;
            left: 50px;
        }
        
        .dot-2 {
            background-color: #3b5bdb;
            top: 150px;
            left: 250px;
        }
        
        .dot-3 {
            background-color: #ff6b6b;
            top: 200px;
            right: 350px;
        }
        
        .dot-4 {
            background-color: #ff922b;
            bottom: 150px;
            left: 150px;
        }
        
        .dot-5 {
            background-color: #1098ad;
            bottom: 100px;
            right: 150px;
        }
        
        .dot-6 {
            background-color: #ff00ff;
            bottom: 200px;
            right: 250px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <a href="/" class="logo">
                <div class="logo-icon">J</div>
                Juniorfood
            </a>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="{{ route('menu') }}">Menu</a>
                <a href="{{ route('service') }}">Service</a>
                <a href="{{ route('shop') }}">Shop</a>
            </div>
            <div class="nav-right">
                <div class="search-box">
                    <input type="text" placeholder="Search">
                </div>
                <a href="{{ route('cart') }}"" class="cart-icon">
                    <span>🛒</span>
                    <div class="cart-badge">3</div>
                </a>
            </div>
        </nav>
        
        <div class="page-header">
            <div class="page-title">
                <h1>Food Shop</h1>
                <p>Explore our high-quality food products and kitchenware</p>
            </div>
            <div class="filter-dropdown">
                <button class="filter-btn">
                    <span>Filter</span>
                    <span>▼</span>
                </button>
            </div>
        </div>
        
        <div class="shop-grid">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://i.pinimg.com/736x/1c/b7/bb/1cb7bb57552b001adbed5ef0ea33340a.jpg" alt="Premium Olive Oil">
                </div>
                <div class="product-details">
                    <div class="product-category">Oils & Vinegars</div>
                    <h3 class="product-title">Premium Olive Oil</h3>
                    <div class="product-price">$24.99</div>
                    <div class="product-actions">
                        <button class="add-to-cart">Add to Cart</button>
                        <button class="wishlist-btn">❤️</button>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-image">
                    <img src="https://i.pinimg.com/736x/f7/12/e6/f712e6d5c9e22aaa3ff1306b22305c0e.jpg" alt="Chef's Knife Set">
                </div>
                <div class="product-details">
                    <div class="product-category">Kitchenware</div>
                    <h3 class="product-title">Chef's Knife Set</h3>
                    <div class="product-price">$89.99</div>
                    <div class="product-actions">
                        <button class="add-to-cart">Add to Cart</button>
                        <button class="wishlist-btn">❤️</button>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-image">
                    <img src="https://i.pinimg.com/736x/38/4c/27/384c276105058afd833027dec18072dd.jpg" alt="Specialty Spice Set">
                </div>
                <div class="product-details">
                    <div class="product-category">Spices</div>
                    <h3 class="product-title">Specialty Spice Set</h3>
                    <div class="product-price">$34.99</div>
                    <div class="product-actions">
                        <button class="add-to-cart">Add to Cart</button>
                        <button class="wishlist-btn">❤️</button>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-image">
                    <img src="https://i.pinimg.com/736x/71/8f/be/718fbefd27071a543eb495065ac1f68d.jpg" alt="Wooden Cutting Board">
                </div>
                <div class="product-details">
                    <div class="product-category">Kitchenware</div>
                    <h3 class="product-title">Wooden Cutting Board</h3>
                    <div class="product-price">$29.99</div>
                    <div class="product-actions">
                        <button class="add-to-cart">Add to Cart</button>
                        <button class="wishlist-btn">❤️</button>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-image">
                    <img src="https://i.pinimg.com/736x/48/78/3e/48783e2a9b3a5ec4d5f048220939b509.jpg" alt="Gourmet Coffee Beans">
                </div>
                <div class="product-details">
                    <div class="product-category">Beverages</div>
                    <h3 class="product-title">Gourmet Coffee Beans</h3>
                    <div class="product-price">$18.99</div>
                    <div class="product-actions">
                        <button class="add-to-cart">Add to Cart</button>
                        <button class="wishlist-btn">❤️</button>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-image">
                    <img src="https://i.pinimg.com/736x/cb/ba/3a/cbba3afc98200e1be92e2911842186b4.jpg" alt="Juniorfood Cookbook">
                </div>
                <div class="product-details">
                    <div class="product-category">Books</div>
                    <h3 class="product-title">Juniorfood Cookbook</h3>
                    <div class="product-price">$32.50</div>
                    <div class="product-actions">
                        <button class="add-to-cart">Add to Cart</button>
                        <button class="wishlist-btn">❤️</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="pagination">
            <a href="#" class="page-link active">1</a>
            <a href="#" class="page-link">2</a>
            <a href="#" class="page-link">3</a>
            <a href="#" class="page-link">→</a>
        </div>
    </div>
    
    <!-- Decorative dots -->
    <div class="colored-dots dot-1"></div>
    <div class="colored-dots dot-2"></div>
    <div class="colored-dots dot-3"></div>
    <div class="colored-dots dot-4"></div>
    <div class="colored-dots dot-5"></div>
    <div class="colored-dots dot-6"></div>
</body>
</html>