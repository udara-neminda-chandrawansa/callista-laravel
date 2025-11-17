@extends('layouts.public-site')

@section('content')

<!-- Cart Page Header -->
<section class="cart-header">
    <div class="container">
        <div class="breadcrumb">
            <a href="../index.html"><i class="fas fa-home"></i> Home</a>
            <span class="separator">/</span>
            <span class="current">Shopping Cart</span>
        </div>
        <h1>Your Shopping Cart</h1>
        <p class="cart-count-text"><span id="cartItemCount">3</span> items in your cart</p>
    </div>
</section>

<!-- Cart Content -->
<section class="cart-content">
    <div class="container">
        <div class="cart-layout">
            <!-- Cart Items -->
            <div class="cart-items-section">
                <div class="section-title">
                    <h2>Cart Items</h2>
                    <button class="btn-text clear-cart">
                        <i class="fas fa-trash"></i> Clear Cart
                    </button>
                </div>

                <!-- Cart Item 1 -->
                <div class="cart-item">
                    <div class="item-image">
                        <img src="../assets/images/products/chair-1.jpg" alt="Modern Chair"
                            onerror="this.src='../assets/images/placeholder.jpg'">
                        <span class="item-badge">New</span>
                    </div>
                    <div class="item-details">
                        <h3 class="item-name">Modern Scandinavian Chair</h3>
                        <p class="item-category"><i class="fas fa-tag"></i> Furniture</p>
                        <p class="item-description">Elegant design with premium oak wood and comfortable cushioning</p>
                        <div class="item-specs">
                            <span><i class="fas fa-palette"></i> Color: Natural Oak</span>
                            <span><i class="fas fa-ruler-combined"></i> Size: Standard</span>
                        </div>
                    </div>
                    <div class="item-actions">
                        <div class="item-price">
                            <span class="current-price">LKR 45,000</span>
                            <span class="original-price">LKR 55,000</span>
                        </div>
                        <div class="quantity-control">
                            <button class="qty-btn minus" data-item-id="1">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="qty-input" value="1" min="1" max="10" data-item-id="1">
                            <button class="qty-btn plus" data-item-id="1">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <button class="btn-remove" data-item-id="1">
                            <i class="fas fa-trash-alt"></i> Remove
                        </button>
                    </div>
                </div>

                <!-- Cart Item 2 -->
                <div class="cart-item">
                    <div class="item-image">
                        <img src="../assets/images/products/table-1.jpg" alt="Coffee Table"
                            onerror="this.src='../assets/images/placeholder.jpg'">
                    </div>
                    <div class="item-details">
                        <h3 class="item-name">Minimalist Coffee Table</h3>
                        <p class="item-category"><i class="fas fa-tag"></i> Furniture</p>
                        <p class="item-description">Sleek design with tempered glass top and wooden base</p>
                        <div class="item-specs">
                            <span><i class="fas fa-palette"></i> Color: Walnut Brown</span>
                            <span><i class="fas fa-ruler-combined"></i> Size: 120x60 cm</span>
                        </div>
                    </div>
                    <div class="item-actions">
                        <div class="item-price">
                            <span class="current-price">LKR 32,500</span>
                        </div>
                        <div class="quantity-control">
                            <button class="qty-btn minus" data-item-id="2">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="qty-input" value="1" min="1" max="10" data-item-id="2">
                            <button class="qty-btn plus" data-item-id="2">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <button class="btn-remove" data-item-id="2">
                            <i class="fas fa-trash-alt"></i> Remove
                        </button>
                    </div>
                </div>

                <!-- Cart Item 3 -->
                <div class="cart-item">
                    <div class="item-image">
                        <img src="../assets/images/products/lamp-1.jpg" alt="Table Lamp"
                            onerror="this.src='../assets/images/placeholder.jpg'">
                        <span class="item-badge sale">Sale</span>
                    </div>
                    <div class="item-details">
                        <h3 class="item-name">Contemporary Table Lamp</h3>
                        <p class="item-category"><i class="fas fa-tag"></i> Lighting</p>
                        <p class="item-description">Modern design with adjustable brightness and USB charging port</p>
                        <div class="item-specs">
                            <span><i class="fas fa-palette"></i> Color: Matte Black</span>
                            <span><i class="fas fa-lightbulb"></i> LED Compatible</span>
                        </div>
                    </div>
                    <div class="item-actions">
                        <div class="item-price">
                            <span class="current-price">LKR 8,500</span>
                            <span class="original-price">LKR 12,000</span>
                        </div>
                        <div class="quantity-control">
                            <button class="qty-btn minus" data-item-id="3">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="qty-input" value="2" min="1" max="10" data-item-id="3">
                            <button class="qty-btn plus" data-item-id="3">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <button class="btn-remove" data-item-id="3">
                            <i class="fas fa-trash-alt"></i> Remove
                        </button>
                    </div>
                </div>

                <!-- Continue Shopping -->
                <div class="continue-shopping">
                    <a href="marketplace.html" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Continue Shopping
                    </a>
                    <a href="marketplace.html#featured-products" class="btn btn-secondary">
                        <i class="fas fa-store"></i> Browse All Products
                    </a>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="cart-summary-section">
                <div class="summary-card sticky-summary">
                    <h3>Order Summary</h3>

                    <div class="summary-row">
                        <span>Subtotal (4 items)</span>
                        <span class="subtotal-amount">LKR 103,000</span>
                    </div>

                    <div class="summary-row">
                        <span>Discount</span>
                        <span class="discount-amount success">- LKR 13,500</span>
                    </div>

                    <div class="summary-row">
                        <span>Delivery Fee</span>
                        <span class="delivery-fee">LKR 1,500</span>
                    </div>

                    <div class="promo-code-section">
                        <div class="promo-input-group">
                            <input type="text" placeholder="Enter promo code" id="promoCode" class="promo-input">
                            <button class="btn-apply">Apply</button>
                        </div>
                        <p class="promo-message" style="display: none;"></p>
                    </div>

                    <div class="summary-divider"></div>

                    <div class="summary-row total">
                        <span>Total Amount</span>
                        <span class="total-amount">LKR 91,000</span>
                    </div>

                    <div class="savings-badge">
                        <i class="fas fa-check-circle"></i> You're saving LKR 13,500!
                    </div>

                    <button class="btn btn-primary btn-full checkout-btn">
                        <i class="fas fa-lock"></i> Proceed to Checkout
                    </button>

                    <div class="security-badges">
                        <span><i class="fas fa-shield-alt"></i> Secure Checkout</span>
                        <span><i class="fas fa-truck"></i> Free Returns</span>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="info-cards">
                    <div class="info-card">
                        <i class="fas fa-shipping-fast"></i>
                        <div>
                            <h4>Fast Delivery</h4>
                            <p>Delivered within 3-5 business days</p>
                        </div>
                    </div>
                    <div class="info-card">
                        <i class="fas fa-undo"></i>
                        <div>
                            <h4>Easy Returns</h4>
                            <p>30-day return policy</p>
                        </div>
                    </div>
                    <div class="info-card">
                        <i class="fas fa-headset"></i>
                        <div>
                            <h4>24/7 Support</h4>
                            <p>Always here to help</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recommended Products -->
<section class="recommended-products">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">You May Also Like</h2>
            <a href="marketplace.html" class="view-all-link">
                <span>View All Products</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="products-grid">
            <div class="product-card" data-category="living-room">
                <div class="product-image">
                    <img src="../assets/images/products/product-1.jpg" alt="Product"
                        onerror="this.src='../assets/images/placeholder.jpg'">
                    <button class="quick-add" title="Add to Cart" aria-label="Add Designer Sofa to Cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
                <div class="product-info">
                    <h4>Designer Sofa</h4>
                    <p class="product-price">LKR 125,000</p>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(4.5)</span>
                    </div>
                    <a href="marketplace.html#category-living-room" class="category-link">
                        <i class="fas fa-tag"></i>
                        <span>Browse Living Room</span>
                    </a>
                </div>
            </div>

            <div class="product-card" data-category="bedroom-sets">
                <div class="product-image">
                    <img src="../assets/images/products/product-2.jpg" alt="Product"
                        onerror="this.src='../assets/images/placeholder.jpg'">
                    <button class="quick-add" title="Add to Cart" aria-label="Add Wooden Cabinet to Cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    <span class="product-badge">New</span>
                </div>
                <div class="product-info">
                    <h4>Wooden Cabinet</h4>
                    <p class="product-price">LKR 68,000</p>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span>(4.0)</span>
                    </div>
                    <a href="marketplace.html#category-bedroom-sets" class="category-link">
                        <i class="fas fa-tag"></i>
                        <span>Browse Bedroom Sets</span>
                    </a>
                </div>
            </div>

            <div class="product-card" data-category="tables">
                <div class="product-image">
                    <img src="../assets/images/products/product-3.jpg" alt="Product"
                        onerror="this.src='../assets/images/placeholder.jpg'">
                    <button class="quick-add" title="Add to Cart" aria-label="Add Floor Lamp to Cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
                <div class="product-info">
                    <h4>Floor Lamp</h4>
                    <p class="product-price">LKR 15,500</p>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(5.0)</span>
                    </div>
                    <a href="marketplace.html#category-tables" class="category-link">
                        <i class="fas fa-tag"></i>
                        <span>Browse Tables</span>
                    </a>
                </div>
            </div>

            <div class="product-card" data-category="chairs">
                <div class="product-image">
                    <img src="../assets/images/products/product-4.jpg" alt="Product"
                        onerror="this.src='../assets/images/placeholder.jpg'">
                    <button class="quick-add" title="Add to Cart" aria-label="Add Decorative Mirror to Cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    <span class="product-badge sale">-20%</span>
                </div>
                <div class="product-info">
                    <h4>Decorative Mirror</h4>
                    <p class="product-price">
                        LKR 22,000
                        <span class="old-price">LKR 27,500</span>
                    </p>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(4.7)</span>
                    </div>
                    <a href="marketplace.html#category-chairs" class="category-link">
                        <i class="fas fa-tag"></i>
                        <span>Browse Chairs</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Marketplace Quick Access -->
        <div class="marketplace-quick-access">
            <div class="quick-access-grid">
                <a href="marketplace.html#category-living-room" class="quick-access-item">
                    <i class="fas fa-couch"></i>
                    <span>Living Room</span>
                </a>
                <a href="marketplace.html#category-bedroom-sets" class="quick-access-item">
                    <i class="fas fa-bed"></i>
                    <span>Bedroom</span>
                </a>
                <a href="marketplace.html#category-tables" class="quick-access-item">
                    <i class="fas fa-table"></i>
                    <span>Tables</span>
                </a>
                <a href="marketplace.html#category-chairs" class="quick-access-item">
                    <i class="fas fa-chair"></i>
                    <span>Chairs</span>
                </a>
                <a href="marketplace.html#category-custom" class="quick-access-item">
                    <i class="fas fa-tools"></i>
                    <span>Custom</span>
                </a>
                <a href="marketplace.html" class="quick-access-item featured">
                    <i class="fas fa-store"></i>
                    <span>All Products</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection