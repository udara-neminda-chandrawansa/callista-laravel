@extends('layouts.admin-dashboard')

@section('content')

<div class="dashboard-content">
    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-title">Total Revenue</div>
                <div class="stat-icon primary">
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>
            <div class="stat-value">LKR 2,847,500</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i>
                <span>+12.5% from last month</span>
            </div>
        </div>

        <div class="stat-card success">
            <div class="stat-header">
                <div class="stat-title">Total Orders</div>
                <div class="stat-icon success">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
            <div class="stat-value">1,247</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i>
                <span>+8.2% from last month</span>
            </div>
        </div>

        <div class="stat-card warning">
            <div class="stat-header">
                <div class="stat-title">Total Users</div>
                <div class="stat-icon warning">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="stat-value">{{ $adminData['totalUsers'] ?? 0 }}</div>
            <div class="stat-change neutral">
                <i class="fas fa-info-circle"></i>
                <span>{{ $adminData['adminUsers'] ?? 0 }} admin(s), {{ $adminData['regularUsers'] ?? 0 }} user(s)</span>
            </div>
        </div>

        <div class="stat-card info">
            <div class="stat-header">
                <div class="stat-title">Products Sold</div>
                <div class="stat-icon info">
                    <i class="fas fa-box"></i>
                </div>
            </div>
            <div class="stat-value">2,847</div>
            <div class="stat-change negative">
                <i class="fas fa-arrow-down"></i>
                <span>-2.1% from last month</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <a href="products" class="quick-action">
            <div class="quick-action-icon">
                <i class="fas fa-plus"></i>
            </div>
            <div class="quick-action-title">Add Product</div>
        </a>

        <a href="users" class="quick-action">
            <div class="quick-action-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="quick-action-title">Add User</div>
        </a>

        <a href="orders" class="quick-action">
            <div class="quick-action-icon">
                <i class="fas fa-eye"></i>
            </div>
            <div class="quick-action-title">View Orders</div>
        </a>

        <a href="#" class="quick-action">
            <div class="quick-action-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="quick-action-title">Analytics</div>
        </a>
    </div>

    <!-- Content Grid -->
    <div class="content-grid">
        <!-- Sales Chart -->
        <div class="content-card">
            <div class="card-header">
                <h3 class="card-title">Sales Overview</h3>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="content-card">
            <div class="card-header">
                <h3 class="card-title">Recent Activity</h3>
            </div>
            <div class="card-body">
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon success">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Order #1247 completed</div>
                            <div class="activity-time">2 minutes ago</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon primary">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">New user registered</div>
                            <div class="activity-time">5 minutes ago</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon warning">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Product stock low</div>
                            <div class="activity-time">15 minutes ago</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon info">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">New order received</div>
                            <div class="activity-time">22 minutes ago</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon success">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Payment processed</div>
                            <div class="activity-time">1 hour ago</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection