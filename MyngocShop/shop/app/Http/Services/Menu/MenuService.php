<?php
namespace App\Http\Services\Menu;
use App\Models\Menu;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;

class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();     
    }
    public function show()
    {
        return Menu::select('name','id','thumb')->where('parent_id',0)->orderbyDesc('id')->get();
    }
    public function getall()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
       try{
            $existingMenu = Menu::where('name', $request->input('name'))->first();
            if ($existingMenu) {
                $request->session()->flash('error', 'Danh mục đã tồn tại');
                return false;
            }
            Menu::create([
                'name'=>(string) $request->input('name'),
                'parent_id'=>(int) $request->input('parent_id'),
                'description'=>(string) $request->input('description'),
                'content'=>(string) $request->input('content'),
                'thumb'=>(string) $request->input('thumb'),
                'active'=>(string) $request->input('active'),
            ]);
            $request->session()->flash('success', 'tao danh muc thanh cong');
        } catch (\Exception $err) {
            $request->session()->flash('error', $err->getMessage());
            return false;
        }
       return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $menu = Menu::where('id',$id)->first();
        if($menu){
            return Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
        }
        return false;
    }

    public function update($request,$menu) : bool
    {
        if($request->input('parent_id') != $menu->id)
        {
            $menu->parent_id = (int)$request->input('parent_id');
        }
        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->thumb = (string) $request->input('thumb');
        $menu->active = (string) $request->input('active');
        $menu->save();
        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }


    public function getId($id)
    {
        return Menu::where('id',$id)->where('active',1)->firstOrFail();
    }

    public function getProduct($menu)
    {
        return $menu->products()
        ->select('id','name','price','price_sale','thumb')
        ->where('active',1)
        ->orderByDesc('id')
        ->paginate(12);
    }
}