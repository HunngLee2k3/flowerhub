<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FlowerHub' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/custom.css'])
</head>
<body>
    @auth
        @if(auth()->user()->role === 'admin')
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a></li>
        @endif
    @endauth
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <!--<img src="{{ asset('images/logo.png') }}" alt="FlowerHub" height="40"> <!-- Thay bằng logo của bạn -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">Giỏ hàng</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('orders.history') }}">Lịch sử đơn hàng</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('addresses.index') }}">Quản lý địa chỉ</a></li>
                        
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a></li>
                        @endif
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-white">Đăng xuất</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Đăng nhập</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Đăng ký</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-success text-white mt-3 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>FlowerHub</h5>
                    <p>Cửa hàng hoa trực tuyến hàng đầu, mang đến những bó hoa tươi đẹp nhất cho mọi dịp.</p>
                    <p>🌸 Cảm ơn bạn đã chọn hoa của chúng tôi!💐</p>
                </div>
                <div class="col-md-4">
                    <h5>Liên kết nhanh</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white">Trang chủ</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-white">Sản phẩm</a></li>
                        <li><a href="{{ route('cart.index') }}" class="text-white">Giỏ hàng</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Liên hệ</h5>
                    <p>Email: support@flowerhub.com</p>
                    <p>Điện thoại: 0123-456-789</p>
                    <p>Địa chỉ: 123 Thủ Đức,TP.Hồ Chí Minh </p>
                </div>
            </div>
            <hr class="bg-light">
            <p class="text-center mb-0">&copy; {{ date('Y') }} FlowerHub. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/js/app.js', 'resources/js/custom.js'])
</body>
</html>