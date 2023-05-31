<?php
namespace App\Http\Services\Slider;
use App\Models\Slider;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Session;

class SliderService {
     public function insert($request){
        try{
          Slider::create($request->input());
          Session::flash('success','Them Slider thanh cong');
        }catch(\Exception $err){
            Session::flash('error','Them Slider that bai');
            Log::info($err->getMessage());
            return false;
        }
        return true;

     }
     public function get()
     {
      return Slider::orderByDesc('id')->paginate(10);
      
     }
     public function update($request,$slider){
      try{
        $slider->fill($request->input());
           $slider->save();
           Session::flash('success','Cap nhat Slider thanh cong');
      }catch(Exception $err){
        Session::flash('error','Cap nhat Slider that bai!!!');
        Log::info($err->getMessage());
        return false;
      }
           
          return true;
     }
    public function destroy($request){
      $slider = Slider::where('id', $request->input('id'))->first();
      if ( $slider){
        $path =  $slider->thumb;       
        Storage::delete($path);
        $slider->delete();
         return true;
      }
      return false;
      
    }
    public function show()
    {
        return Slider::where('active',1)->orderByDesc('sort_by')->get();
    }
}