<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $productService;
    public function __construct(ProductAdminService $productService )
    {
        $this->productService = $productService;
    }

    public function index()
    {
        
        $products =  $this->productService->get();
        return view('admin.products.list',[
            'title'=>'danh sach san pham',
            'products'=>$products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $products =  $this->productService->getMenu();
        return view('admin.products.add', [
            'title' => 'them san pham moi ',
            'products'=> $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormRequest $request )
    {
        $this->productService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product )
    {
        $menus =  $this->productService->getMenu();
        return view('admin.products.edit',[
            'title'=>'chinh sua sản phẩm: '.$product->name,
            'product'=>$product,
            'menus'=> $menus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->productService->update($request,$product);
        return redirect('/admin/products/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
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
