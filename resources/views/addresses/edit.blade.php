@extends('layouts.app')
@section('title', 'Sửa địa chỉ - FlowerHub')
@section('content')
    <h1>Sửa địa chỉ</h1>
    <form action="{{ route('addresses.update', $address->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="address_line" class="form-label">Địa chỉ</label>
            <input type="text" name="address_line" id="address_line" class="form-control" value="{{ $address->address_line }}" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Thành phố</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ $address->city }}" required>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Quốc gia</label>
            <input type="text" name="country" id="country" class="form-control" value="{{ $address->country }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $address->phone }}" required>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật địa chỉ</button>
    </form>
@endsection