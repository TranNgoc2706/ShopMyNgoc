@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px ">ID</th>
            <th>Tên sản phẩm</th>
            <th>danh mục</th>
            <th>giá gốc</th>
            <th>giá khuyến mãi</th>
            <th>active</th>
            <th>update</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key => $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->menu->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->price_sale}}</td>
            <td>{!!\App\Helpers\Helper::active($product->active)!!}</td>
            <td>{{ $product->updated_at }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{$product->id}}">
                    <i class="fas fa-edit"></i></a>
            </td>
            <td>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{$product->id}},'/admin/products/destroy');">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<div class="pagination">
    {!! $products->links()!!}
</div>



@endsection
@include ("admin.alerterror")