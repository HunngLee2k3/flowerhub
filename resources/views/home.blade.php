@extends('layouts.app')
@section('title', 'Trang chủ - FlowerHub')
@section('content')
    <!-- Hero Section -->
    <div class="hero-section">
    <img src="{{ asset('images/f1.webp') }}" alt="FlowerHub Hero Image" class="img-fluid">
    <div class="hero-text" style="color:rgb(0, 255, 123);">
    <h1>Chào mừng bạn đến với FlowerHub</h1>
    <p>Cửa hàng cho những bông hoa đẹp</p>
    </div>

    </div>

    <!-- About Us Section -->
   <!-- About Us Section -->
    <div class="about-section">
        <h2 class="about-title">Về chúng tôi</h2>
        <p class="about-text">FlowerHub là cửa hàng hoa trực tuyến hàng đầu, mang đến những bó hoa tươi đẹp nhất cho mọi dịp. Đội ngũ chuyên gia của chúng tôi đảm bảo mỗi bó hoa được chăm chút và giao đúng giờ.</p>
        <p class="about-text">Chúng tôi cam kết cung cấp sản phẩm chất lượng cao và dịch vụ khách hàng tận tâm. Hãy để chúng tôi giúp bạn gửi gắm tình cảm qua những bó hoa tươi thắm.</p>
        <p class="about-text">🌸 Cảm ơn bạn đã chọn hoa của chúng tôi!💐</p>
    </div>
        
    </div>

    <!-- Sản phẩm nổi bật -->
    <div class="featured-products-section" style="text-align: center; ">
        <h2>Danh sách sản phẩm nổi bật</h2> 
        <div class="row" style="margin-top: 20px;">
            @foreach ($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        @if ($product->image)
                            <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ number_format($product->price) }} VNĐ</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Xem chi tiết</a>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success add-to-cart">Thêm vào giỏ</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Đánh giá khách hàng -->
    <div class="testimonials-section">
        <h2>Khách hàng nói gì</h2>
        <div class="testimonial">
            <p>"Hoa rất đẹp và tươi! Giao hàng đúng giờ, rất hài lòng!"</p>
            <span>- Trịnh Đồng Thạch Trúc</span>
        </div>
        <div class="testimonial">
            <p>"Tôi chưa bao giờ thấy website nào đẹp như nàynày"</p>
            <span>- Lê Văn Hùng</span>
        </div>
        <div class="testimonial">
            <p>"Hoa rất đẹp và rẻ "</p>
            <span>- Nguyễn Lê Thế Anh</span>
        </div>
    </div>

    <!-- Đăng ký bản tin -->
    <div class="newsletter-section">
        <style>
        h2 {
            text-align: center;
        }
        </style>
        <h2>Đăng ký bản tin</h2>

        <p>Cập nhật sản phẩm mới và ưu đãi đặc biệt.</p>
        <form action="#" method="POST">
            <input type="email" placeholder="Nhập email của bạn" required>
            <button type="submit">Đăng ký</button>
        </form>
    </div>
@endsection