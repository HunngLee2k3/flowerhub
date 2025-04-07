@extends('layouts.admin')
@section('title', 'Sửa sản phẩm - FlowerHub')
@section('content')
    <h1>Sửa sản phẩm</h1>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" width="100" class="mt-2">
            @endif
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Tồn kho</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật sản phẩm</button>
    </form>
@endsection