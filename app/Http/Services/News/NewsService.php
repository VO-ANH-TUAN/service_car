<?php

namespace App\Http\Services\News;

use App\Models\News;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class NewsService
{

    public function get()
    {
        return News::orderByDesc('id')->paginate(10);
    }
    public function update($request,$news){
        try{
            $news->fill($request->input());
            $news->save();
            Session::flash('success','Cập nhật dịch vụ thành công!');
        }catch(\Exception $err){
            Session::flash('error','Cập nhật dịch vụ thất bại!!!');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }
    public function destroy($request){
        $news = News::where('id', $request->input('id'))->first();
        if ( $news){
            $path =  $news->path;
            Storage::delete($path);
            $news->delete();
            return true;
        }
        return false;

    }
    public function show()
    {
        return News::where('active',1)->orderByDesc('id')->get();
    }

}
