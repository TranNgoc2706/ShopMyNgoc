@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">

            <div class="col-md-6">
                <div class="form-group">
                    <label >Tên Sản Phẩm</label>
                    <input type="text" id="name" name="name" value="{{old('name')}}" placeholder="Nhập tên sản phẩm">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="menu_id" class="form-control" value="{{old('parent_id')}}" id="">
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label >Giá Gốc</label>
                <input type="number" id="price" name="price" value="{{old('price')}}">
            </div>
            <div class="form-group">
                <label >Giá Giảm</label>
                <input type="number" id="price_sale" name="price_sale" value="{{old('price_sale')}}">
            </div>
            <div>
                <label>Mô tả</label>
                <textarea name="description" class="form-control" >{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label>Tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{old('content')}}</textarea>
            </div>
            <div class="form-group">
                <label for="menu">ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

        <div class="form-group">
            <label>Kích hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active">
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="noactive" name="active" checked>
                <label for="noactive" class="custom-control-label">Không</label>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
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
@include ("admin.alerterror")
