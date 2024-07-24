@extends('admin.main')

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tieu de</label>
                    <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="menu">Duong dan</label>
                    <input type="text" name="url" value="{{old('url')}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="menu">ảnh sản phẩm</label>
            <input type="file" class="form-control" id="upload" class="form-control">
            <div id="image_show">
            </div>
            <input type="hidden" name="thumb" id="thumb">
        </div>
        <div class="form-group">
            <label>Sap xep</label>
            <input type="number" name="sort_by" value="{{old('sort_by')}}" class="form-control">
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
        <button type="submit" class="btn btn-primary">Thêm Slider</button>
    </div>
</form>
@endsection


@include ("admin.alerterror")