<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        // Kiểm tra tồn kho
        if ($product->stock <= 0) {
            return redirect()->back()->with('error', 'Sản phẩm đã hết hàng!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Kiểm tra số lượng trong giỏ + thêm mới có vượt tồn kho không
            if ($cart[$id]['quantity'] + 1 > $product->stock) {
                return redirect()->back()->with('error', 'Số lượng vượt quá tồn kho!');
            }
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        
        foreach ($request->quantity as $id => $quantity) {
            $product = Product::find($id);
            if ($product && $quantity > $product->stock) {
                return redirect()->route('cart.index')->with('error', "Số lượng {$product->name} vượt quá tồn kho!");
            }

            if ($quantity > 0) {
                $cart[$id]['quantity'] = $quantity;
            } else {
                unset($cart[$id]); // Xóa nếu số lượng <= 0
            }
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Đã cập nhật giỏ hàng!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }
}