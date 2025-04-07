@extends('layouts.app')
@section('title', 'Thanh toán - FlowerHub')
@section('content')
    <h1>Thanh toán</h1>
    @if (empty($cart))
        <p>Giỏ hàng trống, không thể thanh toán.</p>
    @else
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="address_id" class="form-label">Chọn địa chỉ giao hàng</label>
                <select name="address_id" id="address_id" class="form-control" required>
                    @foreach ($addresses as $address)
                        <option value="{{ $address->id }}">{{ $address->address_line }}, {{ $address->city }}, {{ $address->country }}</option>
                    @endforeach
                </select>
            </div>
            <h4>Tổng tiền: {{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart))) }} VNĐ</h4>
            <button type="submit" class="btn btn-success">Đặt hàng</button>
        </form>
    @endif
@endsection