<?php
namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\UpdateAddressRequest;


class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $addresses = Auth::user()->addresses;
        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        return view('addresses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_line' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required'
        ]);

        Auth::user()->addresses()->create($request->all());
        return redirect()->route('addresses.index')->with('success', 'Đã thêm địa chỉ!');
    }

    public function edit($id)
    {
        $address = Address::findOrFail($id);
        return view('addresses.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address_line' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required'
        ]);

        $address = Address::findOrFail($id);
        $address->update($request->all());
        return redirect()->route('addresses.index')->with('success', 'Đã cập nhật địa chỉ!');
    }

    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return redirect()->route('addresses.index')->with('success', 'Đã xóa địa chỉ!');
    }
}