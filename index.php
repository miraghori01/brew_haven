<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Brew Haven Coffee</title>
    <link rel="stylesheet" href="home.css">


</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">

    <!-- LEFT SIDE LOGO -->
    <div class="nav-logo">
        <img src="logo.png" alt="logo">
       
    </div>

    <!-- RIGHT SIDE MENU -->
    <ul class="nav-menu">
        <li><a href="#home">Home</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#order">Order</a></li>
        <li><a href="#offers">Offers</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#reviews">Reviews</a></li>
        <li><a href="#blog">Blog</a></li>

    <?php if(isset($_SESSION['user_name'])): ?>
        <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="dropbtn">👤 <?php echo $_SESSION['user_name']; ?></a>
            <div class="dropdown-content">
                <a href="profile.php">Profile Details</a>
                <a href="logout.php">Logout</a>
            </div>
        </li>
    <?php else: ?>
        <li><a href="login.php" class="login-nav-btn">Login</a></li>
    <?php endif; ?>

</ul>

<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #3e2723; /* ડાર્ક કોફી કલર */
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
    z-index: 100;
    right: 0;
    border-radius: 8px;
}

.dropdown-content a {
    color: white !important;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #5d4037;
}

/* માઉસ લઈ જવાથી ડ્રોપડાઉન બતાવવા માટે */
.dropdown:hover .dropdown-content {
    display: block;
}

.dropbtn {
    background-color: #795548;
    color: white !important;
    padding: 8px 15px !important;
    border-radius: 20px;
}
</style>
    
</li>


</li>

    </ul>

</nav>
     

<!-- HOME -->
<section id="home">
    <div class="home-content">
        <h1>Brew Haven Coffee</h1>
        <p>Freshly brewed happiness in every cup</p>
    </div>
</section>


<!-- MENU -->
<section id="menu">
    <h2>Our Menu</h2>

    <div class="menu-container">

        <div class="menu-card">
           <img src="espresso.jfif">
            <h3>Espresso</h3>
            <div class="price">₹120</div>
        </div>

        <div class="menu-card">
            <img src="cappuccino.jpg">
            <h3>Cappuccino</h3>
            <div class="price">₹180</div>
        </div>

        <div class="menu-card">
            <img src="latte.jfif">
            <h3>Latte</h3>
            <div class="price">₹160</div>
        </div>

        <div class="menu-card">
            <img src="mocha.jfif">
            <h3>Mocha</h3>
            <div class="price">₹200</div>
        </div>

        <div class="menu-card">
            <img src="cold_coffee.jfif">
            <h3>Cold Coffee</h3>
            <div class="price">₹150</div>
        </div>

        <div class="menu-card">
            <img src="americano.jfif">
            <h3>Americano</h3>
            <div class="price">₹140</div>
        </div>

    </div>
</section>
<!--Order-->

<section id="order">
       <h2 class="main-title">Order Your Coffee ☕</h2>
    <div class="order-container">
     
        <form class="order-form" method="POST" action="order_process.php">
            <div class="coffee-grid">
                <div class="coffee-card">
                    <img src="https://images.unsplash.com/photo-1510707577719-ae7c14805e3a" alt="Espresso">
                    <h3>Espresso</h3>
                    <p class="price">₹120</p>
                    <div class="cart-controls" data-name="qty_espresso" data-price="120">
                        <button type="button" class="add-btn">ADD</button>
                        <div class="qty-group" style="display: none;">
                            <button type="button" class="minus">−</button>
                            <span class="qty-display">1</span>
                            <input type="hidden" name="qty_espresso" class="qty-input" value="0">
                            <button type="button" class="plus">+</button>
                        </div>
                    </div>
                </div>

                <div class="coffee-card">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93" alt="Cappuccino">
                    <h3>Cappuccino</h3>
                    <p class="price">₹180</p>
                    <div class="cart-controls" data-name="qty_cappuccino" data-price="180">
                        <button type="button" class="add-btn">ADD</button>
                        <div class="qty-group" style="display: none;">
                            <button type="button" class="minus">−</button>
                            <span class="qty-display">1</span>
                            <input type="hidden" name="qty_cappuccino" class="qty-input" value="0">
                            <button type="button" class="plus">+</button>
                        </div>
                    </div>
                </div>

                <div class="coffee-card">
                    <img src="https://images.unsplash.com/photo-1498804103079-a6351b050096" alt="Latte">
                    <h3>Latte</h3>
                    <p class="price">₹160</p>
                    <div class="cart-controls" data-name="qty_latte" data-price="160">
                        <button type="button" class="add-btn">ADD</button>
                        <div class="qty-group" style="display: none;">
                            <button type="button" class="minus">−</button>
                            <span class="qty-display">1</span>
                            <input type="hidden" name="qty_latte" class="qty-input" value="0">
                            <button type="button" class="plus">+</button>
                        </div>
                    </div>
                </div>

                <div class="coffee-card">
                    <img src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735" alt="Cold Coffee">
                    <h3>Cold Coffee</h3>
                    <p class="price">₹150</p>
                    <div class="cart-controls" data-name="qty_coldcoffee" data-price="150">
                        <button type="button" class="add-btn">ADD</button>
                        <div class="qty-group" style="display: none;">
                            <button type="button" class="minus">−</button>
                            <span class="qty-display">1</span>
                            <input type="hidden" name="qty_coldcoffee" class="qty-input" value="0">
                            <button type="button" class="plus">+</button>
                        </div>
                    </div>
                </div>

                <div class="coffee-card">
                    <img src="https://images.unsplash.com/photo-1578314675249-a6910f80cc4e" alt="Mocha">
                    <h3>Mocha</h3>
                    <p class="price">₹200</p>
                    <div class="cart-controls" data-name="qty_mocha" data-price="200">
                        <button type="button" class="add-btn">ADD</button>
                        <div class="qty-group" style="display: none;">
                            <button type="button" class="minus">−</button>
                            <span class="qty-display">1</span>
                            <input type="hidden" name="qty_mocha" class="qty-input" value="0">
                            <button type="button" class="plus">+</button>
                        </div>
                    </div>
                </div>

                <div class="coffee-card">
                    <img src="https://images.unsplash.com/photo-1551030173-122aabc4489c" alt="Americano">
                    <h3>Americano</h3>
                    <p class="price">₹140</p>
                    <div class="cart-controls" data-name="qty_americano" data-price="140">
                        <button type="button" class="add-btn">ADD</button>
                        <div class="qty-group" style="display: none;">
                            <button type="button" class="minus">−</button>
                            <span class="qty-display">1</span>
                            <input type="hidden" name="qty_americano" class="qty-input" value="0">
                            <button type="button" class="plus">+</button>
                        </div>
                    </div>
                </div>
            </div>

   <div class="bill-summary-box">
    <h3 class="summary-title">Order Details</h3>
    <form action="order_process.php" method="POST">
    <div class="input-group">
        <label>Customer Name:</label>
        <input type="text" name="full_name" placeholder="Enter your name" required> 
    </div>

    <div class="input-group">
        <label>Phone Number:</label>
        <input type="tel" name="phone" placeholder="Enter your phone number" required>
    </div>

    <div class="input-group">
        <label>Address:</label>
        <textarea name="address" placeholder="Enter your address" required></textarea>
    </div>


</form>
    
    <div id="dynamic-order-list">
        <div class="empty-cart-msg">
            <p>Your cart is empty!</p>
            <a href="#order" class="order-first-btn">Order First</a>
        </div>
    </div>

    <div class="bill-details" id="bill-details" style="display: none;">
        <div class="bill-row"><span>Subtotal:</span> <span>₹<span id="subtotal">0</span></span></div>
        <div class="bill-row"><span>GST (18%):</span> <span>₹<span id="gst">0</span></span></div>
        <div class="bill-row final"><span>Total Payable:</span> <span>₹<span id="final_total">0</span></span></div>
        
        <input type="hidden" name="final_amount_val" id="final_amount_val">
        <button type="submit" name="place_order" class="place-order-btn">Confirm Order</button>
    </div>
</div>
        </form>
    </div>
</section>
<script>
   document.querySelectorAll('.cart-controls').forEach(control => {
    const addBtn = control.querySelector('.add-btn');
    const qtyGroup = control.querySelector('.qty-group');
    const display = control.querySelector('.qty-display');
    const hiddenInput = control.querySelector('.qty-input');
    const plus = control.querySelector('.plus');
    const minus = control.querySelector('.minus');

    addBtn.addEventListener('click', () => {
        addBtn.style.display = 'none';
        qtyGroup.style.display = 'flex';
        display.innerText = 1;
        hiddenInput.value = 1;
        calculateBill();
    });

    plus.addEventListener('click', () => {
        let val = parseInt(display.innerText) + 1;
        display.innerText = val;
        hiddenInput.value = val;
        calculateBill();
    });

    minus.addEventListener('click', () => {
        let val = parseInt(display.innerText) - 1;
        if (val >= 1) {
            display.innerText = val;
            hiddenInput.value = val;
        } else {
            val = 0;
            display.innerText = 0;
            hiddenInput.value = 0;
            qtyGroup.style.display = 'none';
            addBtn.style.display = 'flex';
        }
        calculateBill();
    });
});

function calculateBill() {
    let total = 0;
    let itemsHtml = "";
    let hasItems = false;

    document.querySelectorAll('.cart-controls').forEach(item => {
        const card = item.closest('.coffee-card');
        const name = card.querySelector('h3').innerText;
        const imgSrc = card.querySelector('img').src;
        const price = parseInt(item.getAttribute('data-price'));
        const qty = parseInt(item.querySelector('.qty-input').value) || 0;

        if (qty > 0) {
            hasItems = true;
            total += (price * qty);
            
            // ફોટા અને વિગતો સાથેનું લિસ્ટ બનાવો
            itemsHtml += `
                <div class="selected-item-row">
                    <img src="${imgSrc}" alt="${name}">
                    <div class="item-info">
                        <h4>${name}</h4>
                        <p>Quantity: ${qty}</p>
                    </div>
                    <div class="item-price">₹${price * qty}</div>
                </div>`;
        }
    });

    const listContainer = document.getElementById('dynamic-order-list');
    const billDetails = document.getElementById('bill-details');

    if (hasItems) {
        listContainer.innerHTML = itemsHtml;
        billDetails.style.display = 'block';
    } else {
        listContainer.innerHTML = `
            <div class="empty-cart-msg">
                <p>Your cart is empty!</p>
                <a href="#order" class="order-first-btn">Order First</a>
            </div>`;
        billDetails.style.display = 'none';
    }

    // અમાઉન્ટ અપડેટ કરો
    const gst = total * 0.18;
    const final = total + gst;
    document.getElementById('subtotal').innerText = total;
    document.getElementById('gst').innerText = gst.toFixed(2);
    document.getElementById('final_total').innerText = final.toFixed(2);
    document.getElementById('final_amount_val').value = final.toFixed(2);
}
    
    </script>
<style>
    
  
/* ૧. ટાઈટલ કન્ટેનરની બહાર */
.main-title {
    text-align: center;
    font-size: 3rem;
    color: #3e2723;
    margin: 40px 0;
    font-weight: 700;
}

/* ૨. ઓર્ડર કન્ટેનર (95% પહોળાઈ) */
.order-container {
    width: %;
    max-width: 1300px;
    margin: 0 auto;
    padding: 40px;
    background: #ffffff;
    border-radius: 25px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.05);
}

/* ૩. એક લાઈનમાં ૩ કાર્ડ્સ */
.coffee-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); 
    gap: 40px;
}

/* ૪. કોફી કાર્ડ ડિઝાઇન */
.coffee-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    transition: 0.3s;
    border: 1px solid #f0f0f0;
}

.coffee-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.card-info { padding: 20px; text-align: center; }
.card-info h3 { margin: 0; color: #3e2723; font-size: 1.4rem; }
.price { color: #795548; font-weight: bold; margin: 10px 0; font-size: 1.2rem; }

/* ૫. Swiggy Style બટનો */
.cart-controls {
    width: 110px;
    height: 40px;
    margin: 15px auto 0;
}

.add-btn {
    width: 100%;
    height: 100%;
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    font-weight: 700;
    color: #4a2222;
}

.add-btn:hover {
    background-color: #dac5c2; /* ડાર્ક બ્રાઉન કલર (તમારા સ્ક્રીનશોટ મુજબ) */
   color: #4a2222;
    }

.qty-group {
    width: 120px;
    height: 40px;
    background: #ffffff;
    border: 1.5px solid #e0e0e0;
    border-radius: 8px;
    display: flex;         /* બધું એક જ લાઈનમાં લાવવા માટે */
    align-items: center;    /* ઊભી રીતે સેન્ટર કરવા માટે */
    justify-content: space-between; /* બટનોને છેડા પર અને આંકડાને વચ્ચે રાખવા */
    padding: 0 10px;
    box-sizing: border-box;
    overflow: hidden;
}

/* માઇનસ અને પ્લસ બટનો માટે */
.qty-group button {
    background: none;
    border: none;
    color: #3e2723; /* ડાર્ક કોફી કલર */
    font-size: 22px;
    font-weight: bold;
    cursor: pointer;
    display: flex;         /* આ પણ બટનની અંદર ચિહ્નને સેન્ટર રાખશે */
    align-items: center;
    justify-content: center;
    padding: 0;
    margin: 0;
    line-height: 1;        /* એક્સ્ટ્રા સ્પેસ દૂર કરવા */
    width: 30px;
}

/* વચ્ચેના આંકડા માટેનો સુધારો */
.qty-display {
    color: #795a55;
    font-weight: 700;
    font-size: 18px;
    flex: 1;               /* બાકીની જગ્યા આ રોકશે */
    text-align: center;    /* આડી રીતે સેન્ટર */
    display: flex;         /* ઊભી રીતે સેન્ટર કરવા Flexbox */
    align-items: center;
    justify-content: center;
    line-height: normal;
    height: 100%;          /* પેરન્ટની આખી હાઈટ લેશે */
}

.bill-summary-box {
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    border: 1px solid #ddd;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.empty-cart-msg {
    text-align: center;
    padding: 30px 10px;
}

.order-first-btn {
    display: inline-block;
    background: #795548;
    color: #fff;
    padding: 10px 25px;
    border-radius: 20px;
    text-decoration: none;
    font-weight: bold;
    margin-top: 10px;
}

/* સિલેક્ટ કરેલી આઈટમની રો (Row) */
.selected-item-row {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.selected-item-row img {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    object-fit: cover;
}

.item-info {
    flex: 1;
}

.item-info h4 {
    margin: 0;
    font-size: 1rem;
    color: #3e2723;
}

.item-info p {
    margin: 0;
    font-size: 0.85rem;
    color: #777;
}

.item-price {
    font-weight: bold;
    color: #3e2723;
}

.bill-details {
    margin-top: 20px;
}

    </style>
<!--Offers-->
<section id="offers">

    <h2 class="offers-title">Special Offers & Promotions</h2>
    <p class="offers-subtitle">Grab these amazing deals on our trending coffee drinks!</p>

    <div class="offers-container">

        <div class="offer-card">
            <img src="offer_espresso.webp" alt="Espresso Deal">
            <h3>Espresso Combo</h3>
            <p>Buy 1 Espresso, Get 1 Free</p>
        </div>

        <div class="offer-card">
            <img src="offer_latte.jpg" alt="Latte Offer">
            <h3>Latte Lovers</h3>
            <p>20% Off on all Latte drinks</p>
        </div>

        <div class="offer-card">
            <img src="offer_cold_brew.jpg" alt="Cold Brew Deal">
            <h3>Cold Brew Special</h3>
            <p>Buy any Cold Brew + Free Cookie</p>
        </div>

        <div class="offer-card">
            <img src="offer_cappuccino.webp" alt="Cappuccino Offer">
            <h3>Cappuccino Festival</h3>
            <p>Flat 15% Off on Cappuccino</p>
        </div>

    </div>

</section>
<!-- Gallrey-->
 <section id="gallery">

    <h2>Our Coffee Gallery</h2>

    <div class="gallery-container">

        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">
        <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085">
        <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348">
       <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">
        <img src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735">
        <img src="https://images.unsplash.com/photo-1442512595331-e89e73853f31">

    </div>

</section>

<!-- ABOUT -->
<section id="about">
    
    <div class="about-container">

        <div class="about-image">
            <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085" alt="Coffee Shop">
        </div>

        <div class="about-text">
            <h2>About Brew Haven</h2>

            <p>
                At Brew Haven, coffee is more than just a drink — it's an experience.
                We carefully select premium coffee beans and craft every cup with
                passion and perfection.
            </p>

            <p>
                Our cozy atmosphere, rich aroma, and smooth flavors create the
                perfect place to relax, connect, and enjoy life’s little moments.
                From classic espresso to creamy latte, every sip is made with love.
            </p>

            <ul>
                <li>✔ Premium quality coffee beans</li>
                <li>✔ Freshly brewed drinks</li>
                <li>✔ Warm & cozy environment</li>
                <li>✔ Friendly service</li>
            </ul>

        </div>

    </div>

</section>

<!-- CONTACT -->
<section id="contact">

    <h2>Contact Us</h2>

    <div class="contact-container">

        <!-- Contact Info -->
        <div class="contact-info">
            <h3>Get In Touch</h3>
            <p>Have questions or want to visit us? Reach out anytime.</p>

            <p><strong>📍 Address:</strong> Coffee Street, Surat</p>
            <p><strong>📞 Phone:</strong> +91 98765 43210</p>
            <p><strong>📧 Email:</strong> brewhaven@email.com</p>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <input type="text" placeholder="Your Name">
            <input type="email" placeholder="Your Email">
            <textarea rows="5" placeholder="Your Message"></textarea>
            <button>Send Message</button>
        </div>

    </div>

</section>
<!--reviews-->
<section id="reviews">

    <h2 class="review-title">What Our Customers Say</h2>

    <div class="review-container">

        <div class="review-card">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="customer">
            <h3>Priya Shah</h3>
            <p class="stars">★★★★★</p>
            <p>
                Amazing coffee and beautiful ambience. The espresso taste is rich 
                and perfectly brewed. Highly recommended!
            </p>
        </div>

        <div class="review-card">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="customer">
            <h3>Rahul Patel</h3>
            <p class="stars">★★★★★</p>
            <p>
                Best coffee shop in town! Friendly staff and premium quality beans.
                I love their cappuccino.
            </p>
        </div>

        <div class="review-card">
            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="customer">
            <h3>Neha Mehta</h3>
            <p class="stars">★★★★☆</p>
            <p>
                Cozy atmosphere and great service. Perfect place to relax and enjoy
                fresh coffee with friends.
            </p>
        </div>

    </div>

</section>
<!--Blog-->
<section id="blog">

    <!-- BLOG HERO -->
    <div class="blog-hero">
        <h1>Coffee Knowledge Hub</h1>
        <p>Explore brewing guides, tips, coffee culture & expert secrets</p>
    </div>


    <!-- CATEGORY FILTER -->
    <div class="category-buttons">

    <a href="all.html" class="cat-btn active">All ↪</a>
  

</div>


    <!-- FEATURED POST -->
    <div class="featured-blog">

        <img src="https://images.unsplash.com/photo-1504754524776-8f4f37790ca0">

        <div class="featured-content">
            <h2>The Ultimate Coffee Brewing Guide</h2>
            <p>
                Learn professional barista techniques to make perfect coffee at home.
                Discover grind size, temperature, brewing methods and more.
            </p>
        </div>

    </div>



    <!-- BLOG CONTENT AREA -->
    <div class="blog-layout">

        <!-- BLOG GRID -->
        <div class="blog-container">

            <div class="blog-card">
                <img src="a_vs_r.jpg">
                <h3>Arabica vs Robusta</h3>
                <p>Understand bean differences.</p>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1536520002442-39764a41e987">
                <h3>Cold Brew Method</h3>
                <p>Refreshing smooth coffee guide.</p>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1514066558159-fc8c737ef259">
                <h3>Latte Art Basics</h3>
                <p>Create beautiful milk patterns.</p>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1509785307050-d4066910ec1e">
                <h3>Storage Tips</h3>
                <p>Keep coffee fresh longer.</p>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1494314671902-399b18174975">
                <h3>Coffee Culture</h3>
                <p>Explore global traditions.</p>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1504639725590-34d0984388bd">
                <h3>Morning Routine</h3>
                <p>Start day with energy.</p>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772">
                <h3>Barista Secrets</h3>
                <p>Professional techniques.</p>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1521302080334-4bebac2763a6">
                <h3>Perfect Espresso</h3>
                <p>Strong rich coffee guide.</p>
            </div>

            <div class="blog-card">
                <img src="https://images.unsplash.com/photo-1459755486867-b55449bb39ff">
                <h3>Brewing Equipment</h3>
                <p>Best tools for coffee.</p>
            </div>

        </div>


        <!-- SIDEBAR -->
        <div class="blog-sidebar">

            <h3>Recent Posts</h3>
            <ul>
                <li>Best Coffee Beans 2025</li>
                <li>French Press Guide</li>
                <li>Milk Frothing Tips</li>
                <li>Cold Coffee Recipes</li>
            </ul>

            <h3>Categories</h3>
            <ul>
                <li>Brewing</li>
                <li>Coffee Beans</li>
                <li>Recipes</li>
                <li>Health Benefits</li>
            </ul>

        </div>

    </div>

</section>
<!-- FOOTER -->
<footer>

    <h3>Brew Haven Coffee</h3>
    <p>Freshly brewed happiness in every cup ☕</p>

    <p>Email: brewhaven@email.com</p>
    <p>Phone: +91 98765 43210</p>

    <div class="footer-bottom">
        © 2026 Brew Haven | All Rights Reserved
    </div>

</footer>


</body>
<script>
window.onload = function() {
    // localStorage માંથી ડેટા મેળવો
    const savedUser = JSON.parse(localStorage.getItem('user'));

    // જો ડેટા મળે (યુઝર લોગિન હોય) તો નામ બદલો
    if (savedUser && savedUser.name) {
        const navLink = document.getElementById("user-nav-link");
        
        // "Profile" લખાણને બદલે યુઝરનું નામ બતાવો
        navLink.innerHTML = "👤 " + decodeURIComponent(savedUser.name);
        
        // તેની લિંક પ્રોફાઇલ પેજ પર જ રહે તે ખાતરી કરો
        navLink.href = "profile.php";
    }
}
</script>
</html>