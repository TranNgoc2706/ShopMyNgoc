<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $ProductService;
    public function __construct(ProductService $ProductService)
    {
        $this->ProductService = $ProductService;
    }

    public function index($id = '', $slug = '')
    {
        $product = $this->ProductService->show($id);
        $productsMore = $this->ProductService->more($id);
        return view('product.content', [
            'title' => $product->name,  // Đảm bảo biến 'title' được gán giá trị
            'product' => $product,
            'products' => $productsMore
        ]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
        if (empty($products)) {
            Session::flash('error', 'No products found');
            return redirect()->back();
        }

        return view('search', compact('products'));
    }
}
