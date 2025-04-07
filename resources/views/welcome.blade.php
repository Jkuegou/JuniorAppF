<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juniorfood</title>
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
        
        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px 0;
            position: relative;
        }
        
        .hero-content {
            width: 50%;
        }
        
        .hero-title {
            font-size: 48px;
            font-weight: 700;
            color: #1e2959;
            line-height: 1.2;
            margin-bottom: 20px;
        }
        
        .hero-subtitle {
            color: #777;
            margin-bottom: 30px;
            font-size: 14px;
        }
        
        .hero-buttons {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        
        .btn-primary {
            background-color: #ff6b00;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #e65e00;
        }
        
        .btn-video {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #333;
            text-decoration: none;
            font-weight: 500;
        }
        
        .video-icon {
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .hero-image {
            width: 45%;
            position: relative;
        }
        
        .food-image {
            width: 100%;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .food-card {
            position: absolute;
            bottom: -20px;
            right: 40px;
            background-color: white;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .food-card-title {
            font-size: 14px;
            font-weight: 600;
            margin-top: 5px;
        }
        
        .food-card-rating {
            color: #ffb800;
            font-size: 12px;
        }
        
        .food-card-review {
            font-size: 10px;
            color: #777;
            margin-top: 3px;
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
                <a href="/" class="active">Home</a>
                <a href="{{ route('menu') }}">Menu</a>
                <a href="#">Service</a>
                <a href="#">Shop</a>
            </div>
            <div class="nav-right">
                <div class="search-box">
                    <input type="text" placeholder="Search">
                </div>
                <div class="cart-icon">
                    <span>🛒</span>
                    <div class="cart-badge">3</div>
                </div>
            </div>
        </nav>
        
        <section class="hero">
            <div class="hero-content">
                <h1 class="hero-title">Order Your Favourite Foods & Easy Pickup</h1>
                <p class="hero-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenea tristique adipiscing feugiat praesent. Et libero sed.</p>
                <div class="hero-buttons">
                    <a href="{{ route('login') }}" class="btn-primary">Order Now</a>
                    <a href="#" class="btn-video">
                        <div class="video-icon">▶</div>
                        How To Order
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/logo.jpg') }}" alt="Food Collection" class="food-image" onerror="this.src='https://via.placeholder.com/500x400?text=Food+Collection'">
                <div class="food-card">
                    <div>👨‍🍳</div>
                    <h3 class="food-card-title">Egg Salad</h3>
                    <div class="food-card-rating">★★★★★</div>
                    <p class="food-card-review">Thomas Wise</p>
                </div>
            </div>
            
            <!-- Decorative dots -->
            <div class="colored-dots dot-1"></div>
            <div class="colored-dots dot-2"></div>
            <div class="colored-dots dot-3"></div>
            <div class="colored-dots dot-4"></div>
            <div class="colored-dots dot-5"></div>
            <div class="colored-dots dot-6"></div>
        </section>
    </div>
</body>
</html>