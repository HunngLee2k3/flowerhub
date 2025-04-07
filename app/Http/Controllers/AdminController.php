<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        return view('admin.dashboard', compact('totalOrders', 'totalProducts'));
    }

    public function products()
    {
        $products = Product::with('category')->get(); // Lấy sản phẩm kèm danh mục
        return view('admin.products', compact('products'));
    }

    public function orders()
    {
        $orders = Order::with('user')->get();
        return view('admin.orders', compact('orders'));
    }

    // Hiển thị form thêm sản phẩm
    public function createProduct()
    {
        $categories = Category::all(); // Lấy danh sách danh mục
        return view('admin.products_create', compact('categories'));
    }

    // Lưu sản phẩm mới
    public function storeProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Giới hạn file ảnh 2MB
            'stock' => 'required|integer|min:0'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public'); // Lưu ảnh vào storage/public/products
        }

        Product::create($data);

        return redirect()->route('admin.products')->with('success', 'Đã thêm sản phẩm thành công!');
    }

    // Hiển thị form sửa sản phẩm
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products_edit', compact('product', 'categories'));
    }

    // Cập nhật sản phẩm
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'stock' => 'required|integer|min:0'
        ]);

        $product = Product::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products')->with('success', 'Đã cập nhật sản phẩm thành công!');
    }

    // Xóa sản phẩm
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image); // Xóa ảnh
        }
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Đã xóa sản phẩm thành công!');
    }
}