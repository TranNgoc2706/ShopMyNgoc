@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="name" value="{{$menu->name}}" class="form-control" placeholder="nhap ten">
        </div>
        <div class="form-group">
            <label>Danh mục</label>
            <select name="parent_id" class="form-control" id="">
                <option value="0" {{$menu ->parent_id == 0 ? 'selected' :''}}>Danh mục cha</option>
                @foreach($menus as $menuParent)
                <option value="{{$menuParent->id}}" {{$menu ->parent_id == $menuParent->id ? 'selected' :''}}>
                    {{$menuParent->name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" class="form-control">{{$menu->description}}</textarea>
        </div>
        <div class="form-group">
            <label>Tả chi tiết</label>
            <textarea name="content" id="content" class="form-control">{{$menu->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="menu">ảnh sản phẩm</label>
            <input type="file" class="form-control" id="upload">
            <div id="image_show">
                <a href="" target="_blank">
                    <img src="{{$menu->thumb}}" width="100px" alt="">
                </a>
            </div>
            <input type="hidden" name="thumb" id="thumb" value="{{$menu->thumb}}">
        </div>

        <div class="form-group">
            <label>Kích hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{$menu->active == 1 ?'checked=""' : ''}}>
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="noactive" name="active" {{$menu->active == 0 ?'checked=""' : ''}}>
                <label for="noactive" class="custom-control-label">Không</label>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cap nhat danh mục</button>
    </div>
</form>
@endsection

@section('footer')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof CKEDITOR !== 'undefined') {
            CKEDITOR.replace('content');
        } else {
            console.error('CKEditor không được tải đúng.');
        }
    });
</script>
@endsection
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif