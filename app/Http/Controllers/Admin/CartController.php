<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }
    public function index()
    {
        return view('admin.cart.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }
    public function show(Customer $customer)
    {

        $carts = $this->cart->getProductForCart($customer);

        return view('admin.cart.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);

    }
//    public function store(Request $request){
//        $news = new carts;
//        $news->title = $request->active;
//        $news->save();
//        return redirect();
//    }

    public function destroy(Request $request)
    {
        $result = $this->cart->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công khách hàng'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

}
