@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
    @csrf
    <div class="card-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label >Tên Sản Phẩm</label>
                    <input type="text" id="name" name="name" value="{{$product->name}}" placeholder="Nhập tên sản phẩm">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="menu_id" class="form-control" id="">
                        @foreach($menus as $menu)
                        <option value="{{$menu->id}}" {{$product->menu_id  == $menu->id ? 'selected':''}} >
                            {{$menu->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
     
        
            <div class="form-group">
                <label >Giá Gốc</label>
                <input type="number" id="price" name="price" value="{{$product->price}}" class="form-control">
            </div>
            <div class="form-group">
                <label >Giá Giảm</label>
                <input type="number" id="price_sale" name="price_sale" value="{{$product->price_sale}}" class="form-control">
            </div>
            <div>
                <label>Mô tả</label>
                <textarea name="description" class="form-control" >{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{$product->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="menu">ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload" >
                <div id="image_show">
                    <a href="" target="_blank">
                        <img src="{{$product->thumb}}" width="100px" alt="">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{$product->thumb}}">
            </div>

        <div class="form-group">
            <label>Kích hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" 
                name="active" {{$product->active == 1 ?'checked=""' : ''}}>
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="noactive" 
                name="active" {{$product->active == 0 ?'checked=""' : ''}} >
                <label for="noactive" class="custom-control-label">Không</label>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">cập nhật sản phẩm</button>
    </div>
</form>
@endsection

@section('footer')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof CKEDITOR !== 'undefined') {
                CKEDITOR.replace('content');
            } else {
                console.error('CKEditor không được tải đúng.');
            }
        });
    </script>
@endsection


