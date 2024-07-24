@extends('admin.main')

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $slider->name)  }}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="menu">Đường dẫn</label>
                    <input type="text" name="url" value="{{ old('url', $slider->url)}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="menu">Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="image" id="upload">
            <div id="image_show">
                <a href="{{ $slider->thumb }}" target="_blank">
                    <img src="{{ $slider->thumb }}" width="100px" alt="">
                </a>
            </div>
            <input type="hidden" name="thumb" id="thumb" value="{{ old('thumb' , $slider->thumb )}}">
        </div>
        <div class="form-group">
            <label>Sắp xếp</label>
            <input type="number" name="sort_by" value="{{ old('sort_by', $slider->sort_by) }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Kích hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{ old('active', $slider->active) ==1 ? 'checked' : '' }}>
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="noactive" name="active" {{ old('active', $slider->active) ==0 ? 'checked' : '' }}>
                <label for="noactive" class="custom-control-label">Không</label>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật Slider</button>
    </div>
</form>

@endsection


@include ("admin.alerterror")