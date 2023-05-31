<?php

namespace App\Http\Controllers;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;
use App\Http\Services\ServiceCAR\ServiceCAR;
use App\Http\Services\News\NewsService;
class MenuController extends Controller
{
    protected $menuService;
    protected $service;
    protected  $news;

    public function __construct(MenuService $menuService,ServiceCAR $service,NewsService $news)
    {
        $this->menuService = $menuService;
        $this->service = $service;
        $this->news =   $news;

    }

    public function index(Request $request, $id, $slug)
    {
        $menu = $this->menuService->getId($id);
        $products = $this->menuService->getProduct($menu, $request);

        return view('menu', [
            'title' => $menu->name,
            'products' => $products,
            'menu'  => $menu
        ]);
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
