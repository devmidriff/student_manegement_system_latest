<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet" />

     @stack('styles')

</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                @if(auth()->user()->role === 'super_admin')
                <h3>Supur Admin Panel </h3>
                @endif
            </div>
            
            <nav class="sidebar-nav">
                <div class="nav-title">Main</div>
          
               @if(auth()->user()->role == "super_admin")
                <div class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('register.admin') }}" class="nav-link">
                        <i class="fas fa-users"></i>
                        Add Admin 
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('manage.admin') }}" class="nav-link">
                        <i class="fas fa-box"></i>
                        Manage Admin 
                    </a>
                </div>
               
                @endif


              @if(auth()->user()->role == "school_admin")
                <div class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('register.student') }}" class="nav-link">
                        <i class="fas fa-users"></i>
                        Add Student 
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('register.teacher') }}" class="nav-link">
                        <i class="fas fa-box"></i>
                        Add Teaher 
                    </a>
                </div>

                <div class="nav-item">
                    <a href="{{ route('teachers.list') }}" class="nav-link">
                        <i class="fas fa-box"></i>
                       Manege Teacher
                    </a>
                </div>

                <div class="nav-item">
                    <a href="{{ route('show.goal') }}" class="nav-link">
                        <i class="fas fa-box"></i>
                        Add Goal
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('goals.assign.form') }}" class="nav-link">
                        <i class="fas fa-box"></i>
                       Assign Goal
                    </a>
                </div>
               
                @endif












                
            </nav>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
        </form>

            <div class="sidebar-footer">
                <div class="user-info">
                    <div class="user-avatar">JD</div>
                    <div>
                        <div class="user-name">{{ auth()->user()->name }}</div>
                        <div class="user-role">{{ auth()->user()->role }}</div>
                    </div>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <div class="page-title">
                    <h2>@yield('pagename')</h2>
                    <div class="breadcrumb">
                        <a href="#">Home</a> / <span>@yield('pagename')</span>
                    </div>
                </div>
                <button class="sidebar-toggle d-lg-none">
                    <i class="fas fa-bars"></i>
                </button>

            </div>
            
            <!-- Stats Cards -->
            <!--
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div>
                            <div class="stat-value">1,257</div>
                            <div class="stat-title">Total Users</div>
                        </div>
                        <div class="stat-icon primary">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> 12.5% from last month
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div>
                            <div class="stat-value">342</div>
                            <div class="stat-title">New Orders</div>
                        </div>
                        <div class="stat-icon success">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> 5.7% from last month
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div>
                            <div class="stat-value">$9,257</div>
                            <div class="stat-title">Total Revenue</div>
                        </div>
                        <div class="stat-icon warning">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                    <div class="stat-change negative">
                        <i class="fas fa-arrow-down"></i> 2.3% from last month
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div>
                            <div class="stat-value">87</div>
                            <div class="stat-title">Support Tickets</div>
                        </div>
                        <div class="stat-icon danger">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                    </div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> 8.1% from last month
                    </div>
                </div>
            </div>

-->

           @yield('main-content')
            
            <!-- Main Content Grid -->
             <!-- 
            <div class="content-grid">
                
                <div class="left-column">
                
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
                
              
                <div class="right-column">
                    
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


-->








        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>