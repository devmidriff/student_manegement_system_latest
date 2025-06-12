@extends('layouts.mangement')

@section('title', 'Dashboard')


 @section('pagename')
  Dashboard
 @endsection


 @section('main-content')
            <div class="content-grid">
                <!-- Left Column -->
                <div class="left-column">
                    <!-- Recent Orders Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Orders</h3>
                            <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#ORD-1234</td>
                                        <td>John Smith</td>
                                        <td><span class="status-badge success">Completed</span></td>
                                        <td>$125.00</td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-1233</td>
                                        <td>Sarah Johnson</td>
                                        <td><span class="status-badge warning">Processing</span></td>
                                        <td>$89.99</td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-1232</td>
                                        <td>Michael Brown</td>
                                        <td><span class="status-badge success">Completed</span></td>
                                        <td>$156.50</td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-1231</td>
                                        <td>Emily Davis</td>
                                        <td><span class="status-badge danger">Cancelled</span></td>
                                        <td>$42.99</td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-1230</td>
                                        <td>Robert Wilson</td>
                                        <td><span class="status-badge success">Completed</span></td>
                                        <td>$210.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="right-column">
                    <!-- Activity Timeline -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Activity</h3>
                        </div>
                        <div class="card-body">
                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="activity-content">
                                    <strong>New user registered</strong> - John Smith signed up
                                    <div class="activity-time">5 minutes ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div class="activity-content">
                                    <strong>New order received</strong> - Order #ORD-1234
                                    <div class="activity-time">25 minutes ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                                <div class="activity-content">
                                    <strong>New support ticket</strong> - "Product not working"
                                    <div class="activity-time">1 hour ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="activity-content">
                                    <strong>Order completed</strong> - Order #ORD-1233
                                    <div class="activity-time">2 hours ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-box-open"></i>
                                </div>
                                <div class="activity-content">
                                    <strong>Product updated</strong> - iPhone 13 Pro Max
                                    <div class="activity-time">5 hours ago</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 @endsection