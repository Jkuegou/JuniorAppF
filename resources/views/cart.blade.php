<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JuniorMarket - Cart</title>
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
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .cart-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .cart-items {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        .cart-item img {
            width: 80px;
            border-radius: 10px;
        }
        .cart-item-details {
            flex-grow: 1;
            padding-left: 15px;
        }
        .cart-item-title {
            font-size: 16px;
            font-weight: 600;
        }
        .cart-item-price {
            color: #ff6b00;
            font-weight: 600;
        }
        .cart-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .quantity-btn {
            background: #ff6b00;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .checkout-btn {
            display: block;
            text-align: center;
            background: #ff6b00;
            color: white;
            padding: 15px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 20px;
        }

        .back-btn {
            display: block;
            text-align: center;
            background:rgba(100, 45, 5, 0.74);
            color: white;
            padding: 3px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 20px;
            width: 10%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="cart-title">Your Cart</h1>
        <div class="cart-items">
            <div class="cart-item">
                <img src="https://via.placeholder.com/80" alt="Food Item">
                <div class="cart-item-details">
                    <p class="cart-item-title">Grilled Chicken</p>
                    <p class="cart-item-price">FCFA12.99</p>
                </div>
                <div class="cart-actions">
                    <button class="quantity-btn">-</button>
                    <span>1</span>
                    <button class="quantity-btn">+</button>
                </div>
            </div>
            <div class="cart-item">
                <img src="https://via.placeholder.com/80" alt="Food Item">
                <div class="cart-item-details">
                    <p class="cart-item-title">Veggie Burger</p>
                    <p class="cart-item-price">FCFA9.99</p>
                </div>
                <div class="cart-actions">
                    <button class="quantity-btn">-</button>
                    <span>2</span>
                    <button class="quantity-btn">+</button>
                </div>
            </div>
        </div>
        <a href="#" class="checkout-btn">Proceed to Checkout</a>
        <a href="/" class="back-btn">Back</a>
    </div>
</body>
</html>
