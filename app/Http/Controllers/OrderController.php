<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Yêu cầu đăng nhập
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $addresses = Auth::user()->addresses; // Lấy danh sách địa chỉ của user
        return view('checkout', compact('cart', 'addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:addresses,id'
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        $order = Order::create([
            'user_id' => Auth::id(),
            'address_id' => $request->address_id,
            'total' => $total,
            'status' => 'pending'
        ]);

        foreach ($cart as $id => $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }
         // Gửi email
        Mail::to(Auth::user()->email)->send(new OrderPlaced($order));
        Mail::to('admin@flowerhub.com')->send(new OrderPlaced($order)); // Email admin

        
        session()->forget('cart'); // Xóa giỏ hàng sau khi đặt
        return redirect()->route('home')->with('success', 'Đặt hàng thành công!');
    }
}