<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderRequest;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    protected $sliderService;
    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }
    public function create(){
        return view('admin.Slider.add',[
            'title'=>'them slider moi',
        ]);
    }
    public function store(SliderRequest $request){
        $this->sliderService->insert($request);
        return redirect()->back();
    }
    public function index(){
        return view('admin.Slider.list',[
            'title'=>'danh sach slide ',
            'sliders'=>$this->sliderService->get()
        ]);
    }
    public function show(Slider $slider)
    {
        return view('admin.Slider.edit', [
            'title' => 'Chỉnh sửa slider',
            'slider' => $slider
        ]);
    }


    public function update(Request $request, Slider $slider)
    {
        $result=$this->sliderService->update($request,$slider);
        if($result){
            return redirect('/admin/Slider/list');
        }
        return redirect()->back();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = $this->sliderService->delete($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message' => 'xoa thanh cong'
            ]);
        }
        return response()->json([
            'error'=>true]);
    }

}
