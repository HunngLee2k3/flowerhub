@extends('layouts.app')
@section('title', 'Giỏ hàng - FlowerHub')
@section('content')
    <h1>Giỏ hàng</h1>
    @if (empty($cart))
        <p>Giỏ hàng của bạn đang trống.</p>
    @else
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cart as $id => $item)
                        @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                        <tr>
                            <td>
                                @if ($item['image'])
                                    <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}" width="50">
                                @endif
                                {{ $item['name'] }}
                            </td>
                            <td>{{ number_format($item['price']) }} VNĐ</td>
                            <td>
                                <input type="number" name="quantity[{{ $id }}]" value="{{ $item['quantity'] }}" min="0" class="form-control w-25">
                            </td>
                            <td>{{ number_format($subtotal) }} VNĐ</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Tổng tiền:</strong></td>
                        <td colspan="2">{{ number_format($total) }} VNĐ</td>
                    </tr>
                </tfoot>
            </table>
            <button type="submit" class="btn btn-primary">Cập nhật giỏ hàng</button>
            <a href="{{ route('checkout') }}" class="btn btn-success">Thanh toán</a>
        </form>
    @endif
@endsection