<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juniorfood - Services</title>
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
        
        .page-title {
            text-align: center;
            margin: 30px 0;
        }
        
        .page-title h1 {
            font-size: 36px;
            color: #1e2959;
            margin-bottom: 10px;
        }
        
        .page-title p {
            color: #777;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin: 50px 0;
        }
        
        .service-card {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.1);
        }
        
        .service-icon {
            width: 70px;
            height: 70px;
            background-color: #fff2e8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 24px;
        }
        
        .service-card h3 {
            color: #1e2959;
            margin-bottom: 15px;
        }
        
        .service-card p {
            color: #777;
            font-size: 14px;
            line-height: 1.6;
        }
        
        .cta-section {
            background-color: #ff6b00;
            padding: 60px 0;
            border-radius: 20px;
            margin: 60px 0;
            text-align: center;
            color: white;
        }
        
        .cta-section h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }
        
        .cta-section p {
            max-width: 600px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }
        
        .btn-white {
            background-color: white;
            color: #ff6b00;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .btn-white:hover {
            background-color: #f8f9fc;
            transform: translateY(-3px);
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
                <a href="{{ route('service') }}" class="active">Service</a>
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
        
        <div class="page-title">
            <h1>Our Services</h1>
            <p>We provide a variety of services to make your food experience enjoyable and convenient</p>
        </div>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">🚚</div>
                <h3>Fast Delivery</h3>
                <p>We deliver your food within 30 minutes of ordering. Our delivery personnel follows all safety protocols.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🍽️</div>
                <h3>Catering</h3>
                <p>From small gatherings to large events, our catering service guarantees delicious food for all occasions.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">📱</div>
                <h3>Mobile Ordering</h3>
                <p>Order through our easy-to-use mobile app. Track your delivery in real-time and manage your orders.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🥗</div>
                <h3>Meal Plans</h3>
                <p>Subscribe to our weekly or monthly meal plans for healthy, balanced nutrition delivered to your door.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">👨‍🍳</div>
                <h3>Private Chef</h3>
                <p>Hire our talented chefs to prepare exquisite meals in the comfort of your home for special occasions.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🎂</div>
                <h3>Custom Orders</h3>
                <p>Have specific dietary needs or preferences? We can customize any dish to suit your requirements.</p>
            </div>
        </div>
        
        <div class="cta-section">
            <h2>Need Help With Your Order?</h2>
            <p>Our customer service team is available 24/7 to assist you with any questions or issues regarding our services.</p>
            <a href="#" class="btn-white">Contact Support</a>
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