@extends('layouts.app')
@section('title', $product->name . ' - FlowerHub')
@section('content')
    <h1>{{ $product->name }}</h1>
    <div class="row">
        <div class="col-md-6">
            @if ($product->image)
                <img src="{{ Storage::url($product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            @endif
        </div>
        <div class="col-md-6">
        <p><strong style="color: red;">Giá:</strong> <span style="color: red;">{{ number_format($product->price) }} VNĐ</span></p>
            <p><strong>Mô tả:</strong> {{ $product->description ?? 'Không có mô tả' }}</p>
            <p><strong>Tồn kho:</strong> {{ $product->stock }}</p>
            <p style="font-style: italic;">
             Sản phẩm thực nhận có thể khác với hình đại diện trên website (đặc điểm thủ công và tính chất tự nhiên của hàng nông nghiệp)
            </p>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Thêm vào giỏ hàng</button>
                <button type="submit" class="btn btn-success" style="background-color: #00CED1;">LH:0355527588</button>
            </form>
        </div>
    </div>
@endsection