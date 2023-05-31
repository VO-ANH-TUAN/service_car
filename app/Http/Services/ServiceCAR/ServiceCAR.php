<?php

namespace App\Http\Services\ServiceCAR;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Storage;
use App\Models\Service;
class ServiceCAR
{

    public function insert($request){
        try{
            Service::create($request->input());
            Session::flash('success','Thêm dịch vụ thành công!');
        }catch(\Exception $err){
            Session::flash('error','Them dịch vụ thất bại!!!');
            Log::info($err->getMessage());
            return false;
        }
        return true;

    }
    public function get()
    {
        return Service::orderByDesc('id')->paginate(10);

    }
    public function update($request,$service){
        try{
            $service->fill($request->input());
            $service->save();
            Session::flash('success','Cập nhật dịch vụ thành công!');
        }catch(Exception $err){
            Session::flash('error','Cập nhật dịch vụ thất bại!!!');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }
    public function destroy($request){
        $service = Service::where('id', $request->input('id'))->first();
        if ( $service){
            $path =  $service->thumb;
            Storage::delete($path);
            $service->delete();
            return true;
        }
        return false;

    }
    public function show()
    {
        return Service::where('active',1)->orderByDesc('sort_by')->get();
    }
}
