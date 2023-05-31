<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;
use App\Http\Services\ServiceCAR\ServiceCAR;
use App\Http\Services\News\NewsService;
class DiaryController extends Controller
{
    protected $cart;
    protected $service;
    protected $news;
    public function __construct(CartService $cart,ServiceCAR $service,NewsService $news )
    {
        $this->cart = $cart;
        $this->service = $service;
        $this->news = $news;
    }
    public function index()
    {
        return view('carts.diary', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer1()
        ]);
    }

    public function show(Customer $customer)
    {
//        dd($customer->carts()->get());
        $carts = $this->cart->getProductForCart($customer);

        return view('carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
    public function about()
    {
        return view('about.viewabout',[
            'services'=>$this->service->show()
        ]);
    }
    public function about1()
    {
        return view('about.viewabout',[
            'services'=>$this->service->show()
        ]);
    }
    public function new()
    {
        return view('news.viewnews',[
            'news'=>$this->news->show()
        ]);
    }
    public function contact()
    {
        return view('contact.contact_us'
        );
    }


}
