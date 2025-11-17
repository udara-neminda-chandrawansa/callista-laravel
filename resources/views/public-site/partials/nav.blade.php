<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="assets/cali.jpg" alt="Callista LK">
            <span class="logo-text">Callista<span class="highlight">LK</span></span>
        </div>

        <div class="nav-menu" id="navMenu">
            <ul class="nav-list">
                <li><a href="/" class="nav-link active">Home</a></li>
                <li><a href="/marketplace" class="nav-link">Marketplace</a></li>
                <li><a href="/customize" class="nav-link">Customize</a></li>
                <li><a href="/interior" class="nav-link">Interior Design</a></li>
                <li><a href="/about" class="nav-link">About</a></li>
                <li><a href="/contact" class="nav-link">Contact</a></li>
            </ul>
        </div>

        <div class="nav-actions">
            <button class="nav-icon search-btn" title="Search">
                <i class="fas fa-search"></i>
            </button>
            <button class="nav-icon cart-btn">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">0</span>
            </button>

            <!-- User Account Section -->
            <div class="user-account-section">
                <button class="nav-icon user-btn" id="userAccountBtn" title="User account">
                    <i class="fas fa-user"></i>
                    <i class="fas fa-chevron-down user-chevron"></i>
                </button>

                <!-- User Account Dropdown -->
                <div class="user-dropdown" id="userDropdown">
                    <div class="user-dropdown-header">
                        <div class="user-greeting">Welcome!</div>
                        <div class="user-subtitle">Access your account</div>
                    </div>

                    <!-- Logged Out State -->
                    <div class="user-auth-section" id="userAuthSection">
                        <div class="auth-buttons">
                            <a href="/login" class="auth-btn login-btn">
                                <i class="fas fa-sign-in-alt"></i>
                                <span>Sign In</span>
                            </a>
                            <a href="/register" class="auth-btn register-btn">
                                <i class="fas fa-user-plus"></i>
                                <span>Sign Up</span>
                            </a>
                        </div>
                    </div>

                    <!-- Logged In State (Hidden by default) -->
                    <div class="user-profile-section" id="userProfileSection" style="display: none;">
                        <div class="user-info">
                            <div class="user-avatar">
                                <img src="{{ asset('assets/images/default-avatar.png') }}" alt="User Avatar" id="userAvatar">
                                <div class="user-avatar-fallback">AM</div>
                            </div>
                            <div class="user-details">
                                <div class="user-name" id="userName">Amara Mendis</div>
                                <div class="user-email" id="userEmail">amara@email.com</div>
                            </div>
                        </div>

                        <div class="user-menu">
                            <a href="/dashboard" class="user-menu-item">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                            <a href="/dashboard#orders" class="user-menu-item">
                                <i class="fas fa-shopping-bag"></i>
                                <span>My Orders</span>
                            </a>
                            <a href="/dashboard#favorites" class="user-menu-item">
                                <i class="fas fa-heart"></i>
                                <span>Favorites</span>
                            </a>
                            <a href="/dashboard#profile" class="user-menu-item">
                                <i class="fas fa-user-cog"></i>
                                <span>Profile Settings</span>
                            </a>
                            <div class="user-menu-divider"></div>
                            <button class="user-menu-item logout-btn" id="logoutBtn">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Sign Out</span>
                            </button>
                        </div>
                    </div>

                    <!-- Quick Access Features -->
                    <div class="user-quick-access">
                        <div class="quick-access-title">Quick Access</div>
                        <div class="quick-access-items">
                            <a href="/cart" class="quick-access-item">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Cart</span>
                            </a>
                            <a href="/marketplace" class="quick-access-item">
                                <i class="fas fa-store"></i>
                                <span>Shop</span>
                            </a>
                            <a href="/customize" class="quick-access-item">
                                <i class="fas fa-paint-brush"></i>
                                <span>Custom</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <button class="nav-toggle" id="navToggle" title="Toggle navigation menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</nav>