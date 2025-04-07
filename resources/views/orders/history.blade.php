@extends('layouts.app')
@section('title', 'Lịch sử đơn hàng - FlowerHub')
@section('content')
    <h1>Lịch sử đơn hàng</h1>
    @if ($orders->isEmpty())
        <p>Bạn chưa có đơn hàng nào.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ number_format($order->total) }} VNĐ</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">Xem</button>
                            <!-- Modal -->
                            <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1" aria-labelledby="orderModalLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderModalLabel{{ $order->id }}">Chi tiết đơn hàng #{{ $order->id }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <p><strong>Địa chỉ giao:</strong> 
                                            {{ $order->address ? $order->address->address_line . ', ' . $order->address->city : 'Chưa có địa chỉ' }}
                                        </p>
                                        <h6>Sản phẩm:</h6>
                                        <ul>
                                            @foreach ($order->orderDetails as $detail)
                                                <li>{{ $detail->product->name }} - {{ $detail->quantity }} x {{ number_format($detail->price) }} VNĐ</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection