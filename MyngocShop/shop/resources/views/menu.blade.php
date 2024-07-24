@extends('main')

@section('content')
<section class="bg0 p-t-23 p-b-140 p-t-40">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<h1>{{$title }}</h1>
				</div>
			</div>

			<div id="loadProduct" > 
			    @include('product.list')

                {!! $products->links() !!}
			</div>
		</div>
	</section>
@endsection