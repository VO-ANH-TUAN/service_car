<?php

namespace App\Http\Controllers;


use App\Http\Services\ServiceCAR\ServiceCAR;
use App\Models\Service;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    protected $service;

    public  function __construct(ServiceCAR $service)
    {

        $this->service =$service;
    }
   public function index()
   {
    return view('about.viewabout',[
        'title'=>'Về chúng tôi',
        'services' => $this->service->show()
    ]);
   }
}
