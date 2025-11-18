@extends('layouts.user-dashboard')

@section('content')

<!-- Main Content -->
<main class="dashboard-main">
    <div class="dashboard-header">
        <h1 class="dashboard-title">Welcome back, {{ $userData['user']['name'] }}!</h1>
        <p class="dashboard-subtitle">Here's what's happening with your account</p>
    </div>

    <!-- Account Statistics - Highlighted Section -->
    <div class="highlighted-section">
        <div class="highlight-badge">Account Overview</div>
        <h2 class="section-title-highlighted">
            <i class="fas fa-chart-pie"></i>
            Your Account Summary
        </h2>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Total Orders</div>
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
                <div class="stat-value">12</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+3 this month</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Total Spent</div>
                    <div class="stat-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
                <div class="stat-value">LKR 540K</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+15% from last month</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Saved Items</div>
                    <div class="stat-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div class="stat-value">8</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>2 new favorites</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-title">Loyalty Points</div>
                    <div class="stat-icon">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="stat-value">2,450</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+150 points earned</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions - Highlighted Section -->
    <div class="highlighted-section">
        <div class="highlight-badge">Quick Actions</div>
        <h2 class="section-title-highlighted">
            <i class="fas fa-bolt"></i>
            What would you like to do?
        </h2>

        <div class="quick-actions">
            <a href="/marketplace" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-store"></i>
                </div>
                <div class="action-title">Browse Marketplace</div>
                <div class="action-description">Explore our latest furniture collection</div>
            </a>

            <a href="/customize" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <div class="action-title">Custom Design</div>
                <div class="action-description">Create your personalized furniture</div>
            </a>

            <a href="/interior" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="action-title">Interior Design</div>
                <div class="action-description">Get professional design consultation</div>
            </a>

            <a href="/cart" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="action-title">View Cart</div>
                <div class="action-description">Check your selected items</div>
            </a>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="highlighted-section">
        <div class="highlight-badge">Order History</div>
        <h2 class="section-title-highlighted">
            <i class="fas fa-history"></i>
            Recent Orders
        </h2>

        <div class="recent-orders">
            <div class="orders-header">Your Recent Purchases</div>

            <div class="order-item">
                <div class="order-info">
                    <div class="order-id">#ORD-2025-001</div>
                    <div class="order-date">October 25, 2025</div>
                    <div>Modern Dining Table Set - LKR 125,000</div>
                </div>
                <div class="order-status status-delivered">Delivered</div>
            </div>

            <div class="order-item">
                <div class="order-info">
                    <div class="order-id">#ORD-2025-002</div>
                    <div class="order-date">October 20, 2025</div>
                    <div>Luxury Sofa Set - LKR 185,000</div>
                </div>
                <div class="order-status status-shipped">Shipped</div>
            </div>

            <div class="order-item">
                <div class="order-info">
                    <div class="order-id">#ORD-2025-003</div>
                    <div class="order-date">October 15, 2025</div>
                    <div>Office Chair Collection - LKR 95,000</div>
                </div>
                <div class="order-status status-processing">Processing</div>
            </div>

            <div class="order-item">
                <div class="order-info">
                    <div class="order-id">#ORD-2025-004</div>
                    <div class="order-date">October 10, 2025</div>
                    <div>Custom Bedroom Set - LKR 275,000</div>
                </div>
                <div class="order-status status-delivered">Delivered</div>
            </div>
        </div>
    </div>

    <!-- Account Information -->
    <div class="highlighted-section">
        <div class="highlight-badge">Account Details</div>
        <h2 class="section-title-highlighted">
            <i class="fas fa-user-circle"></i>
            Account Information
        </h2>

        <div class="account-info">
            <div class="info-group">
                <div class="info-label">Full Name</div>
                <div class="info-value">{{ $userData['user']['name'] }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Email Address</div>
                <div class="info-value">{{ $userData['user']['email'] }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Phone Number</div>
                <div class="info-value"></div>
            </div>

            <div class="info-group">
                <div class="info-label">Member Since</div>
                <div class="info-value">{{ $userData['user']['created_at'] }}</div>
            </div>

            <div class="info-group">
                <div class="info-label">Delivery Address</div>
                <div class="info-value"></div>
            </div>

            <div class="info-group">
                <div class="info-label">Account Status</div>
                <div class="info-value"></div>
            </div>
        </div>

        <a href="#profile" class="btn-edit-profile">
            <i class="fas fa-edit"></i>
            Edit Profile
        </a>
    </div>
</main>

@endsection