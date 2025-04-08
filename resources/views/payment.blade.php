<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juniorfood - Payment</title>
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

        /* Header Styles - Same as your other pages */
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

        /* Payment Page Specific Styles */
        .page-title {
            text-align: center;
            margin: 30px 0;
            font-size: 32px;
            color: #333;
        }

        .payment-container {
            display: flex;
            gap: 30px;
            margin-bottom: 50px;
        }

        .payment-form {
            flex: 2;
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .order-summary {
            flex: 1;
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: fit-content;
        }

        .section-title {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #666;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            border-color: #ff7000;
            outline: none;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .payment-methods {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .payment-method {
            flex: 1;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .payment-method:hover {
            border-color: #ff7000;
        }

        .payment-method.active {
            border-color: #ff7000;
            background-color: rgba(255, 112, 0, 0.05);
        }

        .payment-method img {
            height: 30px;
            margin-bottom: 8px;
        }

        .payment-method-name {
            font-size: 14px;
            color: #333;
        }

        .card-icons {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .card-icon {
            width: 40px;
            height: 25px;
            border-radius: 4px;
            object-fit: contain;
        }

        .order-item {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .order-item-img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 15px;
        }

        .order-item-details {
            flex: 1;
        }

        .order-item-name {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        .order-item-price {
            font-size: 14px;
            color: #666;
        }

        .order-item-quantity {
            color: #999;
            font-size: 14px;
        }

        .order-summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 14px;
            color: #666;
        }

        .order-total {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            font-weight: 600;
            font-size: 18px;
            color: #333;
        }

        .pay-now-btn {
            display: block;
            width: 100%;
            padding: 14px;
            margin-top: 30px;
            background-color: #ff7000;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .pay-now-btn:hover {
            background-color: #e06100;
        }

        .secure-payment {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            color: #666;
            font-size: 14px;
        }

        .secure-payment i {
            margin-right: 8px;
            color: #28a745;
        }

        /* Success popup */
        .success-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .success-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .success-popup {
            background-color: white;
            border-radius: 15px;
            padding: 40px;
            width: 90%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
            transform: scale(0.9);
            opacity: 0;
            transition: transform 0.3s, opacity 0.3s;
        }

        .success-overlay.active .success-popup {
            transform: scale(1);
            opacity: 1;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background-color: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 40px;
        }

        .success-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        .success-message {
            color: #666;
            margin-bottom: 30px;
        }

        .success-btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #ff7000;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .success-btn:hover {
            background-color: #e06100;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .payment-container {
                flex-direction: column;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .payment-methods {
                flex-direction: column;
            }

            .search-container {
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
                        <input type="text" class="search-input" placeholder="Search foods...">
                    </div>

                    <div class="cart-container">
                        <span class="cart-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </span>
                        <span class="cart-badge">3</span>
                    </div>

                    <div class="profile-container">
                        <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80"
                            alt="Profile" class="profile-img" id="profileImg">
                        <div class="profile-dropdown" id="profileDropdown">
                            <a href="{{ route('user.dashboard') }}" class="dropdown-item">User Dashboard</a>
                            <a href="#" class="dropdown-item">My Orders</a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                @csrf
                                <button type="submit"
                                    style="background: none; border: none; padding: 0; color: #333; cursor: pointer;">
                                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="container">
        <h1 class="page-title">Complete Your Payment</h1>

        <div class="payment-container">
            <div class="payment-form">
                <h2 class="section-title">Payment Details</h2>

                <div class="payment-methods">
                    <div class="payment-method active">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Old_Visa_Logo.svg/2560px-Old_Visa_Logo.svg.png"
                            alt="Credit Card">
                        <div class="payment-method-name">Credit Card</div>
                    </div>
                    <div class="payment-method">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/2560px-PayPal.svg.png"
                            alt="PayPal">
                        <div class="payment-method-name">PayPal</div>
                    </div>
                    <div class="payment-method">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/1667px-Apple_logo_black.svg.png"
                            alt="Apple Pay">
                        <div class="payment-method-name">Apple Pay</div>
                    </div>
                </div>

                <div class="card-icons">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Old_Visa_Logo.svg/2560px-Old_Visa_Logo.svg.png"
                        alt="Visa" class="card-icon">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png"
                        alt="Mastercard" class="card-icon">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/American_Express_logo_%282018%29.svg/1200px-American_Express_logo_%282018%29.svg.png"
                        alt="Amex" class="card-icon">
                    <img src="https://www.discover.com/content/dam/discover/en_us/global/logos/discover.png"
                        alt="Discover" class="card-icon">
                </div>

                {{-- <form id="paymentForm">
                    <div class="form-group">
                        <label for="cardName" class="form-label">Cardholder Name</label>
                        <input type="text" id="cardName" class="form-input" placeholder="John Doe" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="cardNumber" class="form-label">Card Number</label>
                        <input type="text" id="cardNumber" class="form-input" placeholder="1234 5678 9012 3456" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="expiryDate" class="form-label">Expiry Date</label>
                            <input type="text" id="expiryDate" class="form-input" placeholder="MM/YY" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" id="cvv" class="form-input" placeholder="123" required>
                        </div>
                    </div>
                    
                    <h2 class="section-title">Billing Details</h2>
                    
                    <div class="form-group">
                        <label for="billingAddress" class="form-label">Billing Address</label>
                        <input type="text" id="billingAddress" class="form-input" placeholder="123 Main St" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="city" class="form-label">City</label>
                            <input type="text" id="city" class="form-input" placeholder="New York" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="zipCode" class="form-label">ZIP Code</label>
                            <input type="text" id="zipCode" class="form-input" placeholder="10001" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" id="country" class="form-input" placeholder="United States" required>
                    </div>
                    
                    <button type="submit" class="pay-now-btn">Pay Now</button>
                    
                    <div class="secure-payment">
                        <i class="fas fa-lock"></i> Secure Payment Processing
                    </div>
                </form> --}}

                @if (session('success'))
                    <div style="color: green;">
                        {{ session('success') }}
                    </div>
                @endif

                <form id="paymentForm" method="POST" action="{{ route('orders.store') }}">
                    @csrf

                    <label>Name on Card:</label>
                    <input type="text" name="card_name" required><br>

                    <label>Card Number:</label>
                    <input type="text" name="card_number" required><br>

                    <label>Expiry Date:</label>
                    <input type="text" name="expiry_date" required><br>

                    <label>CVV:</label>
                    <input type="text" name="cvv" required><br>

                    <label>Billing Address:</label>
                    <input type="text" name="billing_address" required><br>

                    <label>City:</label>
                    <input type="text" name="city" required><br>

                    <label>Zip Code:</label>
                    <input type="text" name="zip_code" required><br>

                    <label>Country:</label>
                    <input type="text" name="country" required><br>

                    <input type="hidden" name="order_items" id="orderItems">

                    <button type="submit">Pay Now</button>
                </form>
            </div>

            <div class="order-summary">
                <h2 class="section-title">Order Summary</h2>

                <div class="order-item">
                    <img src="https://images.unsplash.com/photo-1571091718767-18b5b1457add?ixlib=rb-4.0.3"
                        alt="Burger" class="order-item-img">
                    <div class="order-item-details">
                        <h3 class="order-item-name">Classic Beef Burger</h3>
                        <p class="order-item-price">$8.99</p>
                        <p class="order-item-quantity">Qty: 2</p>
                    </div>
                </div>

                <div class="order-item">
                    <img src="https://images.unsplash.com/photo-1625807752781-544f90255196?ixlib=rb-4.0.3"
                        alt="Smoothie" class="order-item-img">
                    <div class="order-item-details">
                        <h3 class="order-item-name">Berry Smoothie</h3>
                        <p class="order-item-price">$5.99</p>
                        <p class="order-item-quantity">Qty: 1</p>
                    </div>
                </div>

                <div class="order-summary-row">
                    <div>Subtotal</div>
                    <div>$23.97</div>
                </div>

                <div class="order-summary-row">
                    <div>Delivery Fee</div>
                    <div>$2.99</div>
                </div>

                <div class="order-summary-row">
                    <div>Tax</div>
                    <div>$1.80</div>
                </div>

                <div class="order-total">
                    <div>Total</div>
                    <div>$28.76</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Success Popup -->
    <div class="success-overlay" id="successPopup">
        <div class="success-popup">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h2 class="success-title">Payment Successful!</h2>
            <p class="success-message">Your order has been placed successfully. You can track your order in the
                tracking section.</p>
            <button class="success-btn" id="continueBtn">Continue Shopping</button>
        </div>
    </div>

    <script>
        // Profile dropdown functionality
        document.addEventListener('DOMContentLoaded', function() {
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

            // Payment method selection
            const paymentMethods = document.querySelectorAll('.payment-method');
            paymentMethods.forEach(method => {
                method.addEventListener('click', () => {
                    // Remove active class from all methods
                    paymentMethods.forEach(m => m.classList.remove('active'));
                    // Add active class to clicked method
                    method.classList.add('active');
                });
            });

            // Form submission
            // const paymentForm = document.getElementById('paymentForm');
            // const successPopup = document.getElementById('successPopup');
            // const continueBtn = document.getElementById('continueBtn');

            // paymentForm.addEventListener('submit', (e) => {
            //     e.preventDefault();

            //     // Here you would typically process the payment
            //     // For demo purposes, just show the success popup
            //     successPopup.classList.add('active');
            //     document.body.style.overflow = 'hidden'; // Prevent scrolling
            // });

            // Continue shopping button
            continueBtn.addEventListener('click', () => {
                successPopup.classList.remove('active');
                document.body.style.overflow = 'auto'; // Enable scrolling
                // Redirect to find food page
                window.location.href = "{{ route('find-food') }}";
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('paymentForm');

            form.addEventListener("submit", function(e) {
                const orderItems = [{
                        name: "Burger",
                        price: 10.99,
                        quantity: 1
                    },
                    {
                        name: "Pizza",
                        price: 15.49,
                        quantity: 2
                    }
                ];
                document.getElementById("orderItems").value = JSON.stringify(orderItems);
                console.log("Order items added:", orderItems);
            });
        });
    </script>

</body>

</html>
