@extends('admin.main')

@section('content')
    <div class="customer">
        <ul>
            <li> Tên khách hàng: <strong>{{$customer->name}}</strong></li>
            <li> số điện thoại: <strong>{{$customer->phone}}</strong></li>
            <li> địa chỉ: <strong>{{$customer->address}}</strong></li>
            <li> Email: <strong>{{$customer->email}}</strong></li>
            <li> Ghi chú: <strong>{{$customer->content}}</strong></li>
        </ul>

    </div>
@endsection