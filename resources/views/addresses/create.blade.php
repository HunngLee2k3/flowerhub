@extends('layouts.app')
@section('title', 'Thêm địa chỉ - FlowerHub')
@section('content')
    <h1>Thêm địa chỉ</h1>
    <form action="{{ route('addresses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="address_line" class="form-label">Địa chỉ</label>
            <input type="text" name="address_line" id="address_line" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Thành phố</label>
            <input type="text" name="city" id="city" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Quốc gia</label>
            <input type="text" name="country" id="country" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm địa chỉ</button>
    </form>
@endsection