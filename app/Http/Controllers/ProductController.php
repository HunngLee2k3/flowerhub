<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category; // Thêm dòng này để sử dụng model Category

class ProductController extends Controller
{
    public function index(Request $request)
{
    $categoryId = $request->query('category_id');
    $products = $categoryId 
        ? Product::where('category_id', $categoryId)->get() 
        : Product::all();
    $categories = Category::all(); // Lấy danh sách danh mục
    return view('products.index', compact('products', 'categories'));
}
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}