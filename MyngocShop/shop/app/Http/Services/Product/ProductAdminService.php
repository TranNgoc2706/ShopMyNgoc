<?php
namespace App\Http\Services\Product;

use App\Http\Requests\Product\CreateFormRequest;
use App\Models\Product;
use App\Http\Services\UploadService;
use App\Models\Menu;

class ProductAdminService{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();     
    }
    

    public function isValidPrice($request)
    {
        if($request->input('price') != 0 && $request->input('price_sale')!= 0 
        && $request->input('price_sale') >= $request->input('price')){
            $request->session()->flash('error', 'giam gia phai nho hon gia goc');
            return false;
        }

        if( $request->input('price_sale') != 0 && $request->input('price') == 0){
            $request->session()->flash('error', 'vui long nhap gia goc');
            return false;
        }

        return true;
    }

    public function insert( $request)
    {

         $isValidPrice = $this->isValidPrice($request);
         if($isValidPrice == false)
            return false;
        try{
            $existingProduct = Product::where('name', $request->input('name'))->first();
            if ($existingProduct) {
                $request->session()->flash('error', 'sản phẩm đã tồn tại');
                return false;
            }

            Product::create($request->all());
            $request->session()->flash('success', 'san pham thanh cong');
        } catch (\Exception $err) {
            $request->session()->flash('error', $err->getMessage());
            return false;
        }
       return true;
    }
    public function get(){
        return Product::with('menu')
        ->orderByDesc('id')->paginate(15);

    }
    public function update($request ,$product){
        
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice == false)
           return false;
        try{
            $product->fill($request->input());
            $product->save();
            $request->session()->flash('success','cap nhat thanh cong');
        }catch(\Exception $err){
            $request->session()->flash('error','cap nhat thanh cong that bai');
            $err->getMessage();
            return false;
        }
        
      return true;
        
    }
    public function delete($request)
    {
        $product = Product::where('id',$request->input('id'))->first();
        if($request){
            $product->delete();
            return true;
        }
        return false;
    }
}