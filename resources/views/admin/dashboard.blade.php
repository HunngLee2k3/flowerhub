@extends('layouts.admin')
@section('title', 'Admin Dashboard - FlowerHub')
@section('content')
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tổng sản phẩm</h5>
                    <p class="card-text">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tổng đơn hàng</h5>
                    <p class="card-text">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection