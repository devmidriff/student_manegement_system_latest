<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h4>Welcome, {{ auth()->user()->name }}</h4>
                <p>Role: <strong>{{ ucfirst(str_replace('_', ' ', auth()->user()->role)) }}</strong></p>
            </div>
            <hr>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    
                    @if(auth()->user()->role === 'super_admin')
                        <li><a href="" class="{{ request()->is('/') ? 'active' : '' }}">Manage Admins</a></li>
                    @endif
                    
                    @if(in_array(auth()->user()->role, ['school_admin']))
                        <li><a href="" class="{{ request()->is('/') ? 'active' : '' }}">Manage Students</a></li>
                        <li><a href="" class="{{ request()->is('/') ? 'active' : '' }}">Manage Teachers</a></li>
                    @endif
                    
                    @if(auth()->user()->role === 'teacher')
                        <li><a href="">My Courses</a></li>
                    @endif
                </ul>
            </nav>
            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar">
                <div class="container-fluid">
                    <h3>@yield('page-title', 'Dashboard')</h3>
                    <div class="user-info">
                        <span class="text-muted">{{ auth()->user()->email }}</span>
                    </div>
                </div>
            </nav>

            <main class="content-wrapper">
        
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>