<?php

namespace App\Http\Controllers;

use App\Http\Services\ServiceCAR\ServiceCAR;
use Illuminate\Http\Request;
use App\Http\Services\News\NewsService;
class NewController extends Controller
{
    protected $news;

    public  function __construct(NewsService $news)
    {

        $this->news =$news;
    }
    public function index()
    {
        return view('news.viewnews',[
            'title'=>'Tin tức',
            'news' => $this->news->show()
        ]);
    }
}
