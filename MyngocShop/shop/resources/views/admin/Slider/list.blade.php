@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px ">ID</th>
            <th>Tiêu đề</th>
            <th>Link</th>
            <th>ảnh</th>
            <th>Trang thái</th>
            <th>cập nhật</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sliders as $key => $slider)
        <tr>
            <td>{{$slider->id}}</td>
            <td>{{$slider->name}}</td>
            <td>{{$slider->url}}</td>
            <td><a href="{{$slider->thumb}}" target="_blank"> 
                <img src="{{$slider->thumb}}" alt="" height="40px"> 
                </a>
            </td>
            <td>{!!\App\Helpers\Helper::active($slider->active)!!}</td>
            <td>{{ $slider->updated_at }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/Slider/edit/{{$slider->id}}">
                    <i class="fas fa-edit"></i></a>
            </td>
            <td>
            <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{$slider->id}},'/admin/Slider/destroy');">
                    <i class="fas fa-trash"></i>
            </a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $sliders->links()!!}

@endsection
@include ("admin.alerterror")