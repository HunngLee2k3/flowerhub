@extends('layouts.app')
@section('title', 'Sản phẩm - FlowerHub')
@section('content')
    <h1>Danh sách sản phẩm</h1>
    <div class="mb-3">
        <label for="category" class="form-label">Lọc theo danh mục:</label>
        <select id="category" class="form-control w-25" onchange="window.location.href='?category_id='+this.value">
            <option value="">Tất cả</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="row">
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
@endsection