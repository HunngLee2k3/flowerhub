@extends('layouts.app')
@section('title', 'Quản lý địa chỉ - FlowerHub')
@section('content')
    <h1>Quản lý địa chỉ</h1>
    <a href="{{ route('addresses.create') }}" class="btn btn-primary mb-3">Thêm địa chỉ</a>
    <table class="table">
        <thead>
            <tr>
                <th>Địa chỉ</th>
                <th>Thành phố</th>
                <th>Quốc gia</th>
                <th>Số điện thoại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($addresses as $address)
                <tr>
                    <td>{{ $address->address_line }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->country }}</td>
                    <td>{{ $address->phone }}</td>
                    <td>
                        <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection