<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create()
    {
        $menus =  $this->menuService->getParent();
        return view('admin.menus.add', [
            'title' => 'them danh muc ',
            'menus'=> $menus,
        ]);

    }

    public function store(CreateFormRequest $request)
    {
        $result = $this->menuService->create($request);
        return redirect()->back();
    }
    public function index()
    {
        
        $menus =  $this->menuService->getall();
        return view('admin.menus.list',[
            'title'=>'danh sach danh muc',
            'menus'=>$menus,
        ]);
    }
    public function show(Menu $menu){
        $menus =  $this->menuService->getParent();
        return view('admin.menus.edit',[
            'title'=>'chinh sua danh muc: '.$menu->name,
            'menu'=>$menu,
            'menus'=> $menus,
        ]);
    }

     public function update(Menu $menu, CreateFormRequest $request)
     {
        $this->menuService->update($request,$menu);
        return redirect('/admin/menus/list');

     }

    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request);
        if($request)
        {
            return response()->json([ //response tra view thong bao
                'error' =>false,
                'massage' =>'xoa thanh cong '
            ]);
        }
         return response()->json([
                'error'=>true
         ]);
    }
}
