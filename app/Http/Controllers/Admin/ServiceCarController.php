<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Services\ServiceCAR\ServiceCAR;

class ServiceCarController extends Controller
{
    protected $service;
    public function __construct(ServiceCAR $service){
        $this->service=$service;
    }
    public function create(){
        return view('admin.service.add',[
            'title'=> 'Thêm dịch vụ xe mới'
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'thumb'=>'required',
            'url'=>'required'

        ]);
        $this->service->insert($request);
        return redirect()->back();
    }
    public function index()
    {
        return view('admin.service.list',[
            'title'=>'Danh sách dịch vụ mới nhất',
            'services'=> $this->service->get()
        ]);
    }
    public function show(Service $service)
    {
        return view('admin.service.edit', [
            'title' => 'Chỉnh Sửa dich vu',
            'service' => $service
        ]);
    }
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url'   => 'required'
        ]);

        $result = $this->service->update($request, $service);
        if ($result) {
            return redirect('/admin/services/list');
        }

        return redirect()->back();
    }
    public function destroy(Request $request){
        $result = $this->service->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Slider'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

}
