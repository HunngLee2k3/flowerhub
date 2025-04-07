<h1>Đơn hàng #{{ $order->id }} đã được đặt</h1>


<p><strong>Thông tin khách hàng:</strong></p>
<p><strong>Tên:</strong> {{ $order->user->name }}</p>
<p><strong>Tổng tiền:</strong> {{ number_format($order->total) }} VNĐ</p>
<p><strong>Địa chỉ giao hàng:</strong> {{ $order->address->address_line }}, {{ $order->address->city }}</p>
<h3>Chi tiết đơn hàng:</h3>
<ul>
    @foreach ($order->orderDetails as $detail)
        <li>{{ $detail->product->name }} - {{ $detail->quantity }} x {{ number_format($detail->price) }} VNĐ</li>
    @endforeach
</ul>