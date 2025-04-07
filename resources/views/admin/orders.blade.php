@extends('layouts.admin')
@section('title', 'Quản lý đơn hàng - FlowerHub')
@section('content')
    <h1>Quản lý đơn hàng</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Địa chỉ giao</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ number_format($order->total) }} VNĐ</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->address ? $order->address->address_line . ', ' . $order->address->city : 'Chưa chọn' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection