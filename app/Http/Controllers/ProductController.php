<?php

namespace App\Http\Controllers;
use App\Http\Services\ServiceCAR\ServiceCAR;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Http\Services\News\NewsService;
class ProductController extends Controller
{
    protected $productService;
    protected $service;
    protected $news;
    public function __construct(ProductService $productService,ServiceCAR $service,NewsService $news )
    {
        $this->productService = $productService;
        $this->service = $service;
        $this->news = $news;
    }
   public function index($id='',$Slug=''){
       $product = $this->productService->show($id);
       $productMore=$this->productService->more($id);
       return view('products.content',[
        'title'=>$product->name,
        'product'=>$product ,
        'products'=>$productMore
       ]);
   }
   public function search(Request $request){

       $data =Product::where('name','like','%'.$request->input('query').'%')->orwhere('description','like','%'.$request->input('query').'%')->get();
       return view('search',['products'=>$data]);
   }
    public function about()
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
