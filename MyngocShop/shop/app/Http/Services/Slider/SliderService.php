<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

 class SliderService
 {
    public function insert( $request){
        try{
            Slider::create($request->input());
            $request->session()->flash('success','them thanh cong');
        }catch(\Exception $err){
            $request->session()->flash('error','them that bai ');
            Log::info($err->getMessage());
            return false;
        }

        return true;

    }
    public function show()//show siler o main
    {
        return Slider::where('active','1')->orderbyDesc('sort_by')->get();
    }

    public function get()
    {
        return Slider::orderbyDesc('id')->paginate(10);
    }

    public function update($request ,$slider){
        try{
            $slider->fill($request->input());
            $slider->save();
            $request->session()->flash('success','cap nhat thanh cong');
        }catch(\Exception $err){
            Session::flash('error','cập nhật lỗi');
            Log::ifno($err->getMessage());
            return false;
        }
        return true;
        
    }
    public function delete($request)
    {
        $slider = Slider::where('id',$request->input('id'))->first();
        if($request){
            $slider->delete();
            return true;
        }
        return false;
    }
    
 }
