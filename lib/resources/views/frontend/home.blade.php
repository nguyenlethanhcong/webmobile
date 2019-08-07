@extends('frontend.master')
@section('title', 'Trang chủ')
@section('main')
<div id="wrap-inner">
	<div class="products">
		<h3>sản phẩm nổi bật</h3>
		<div class="product-list row">
			@foreach($featured as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img width="100px" height="200px"
						src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}"></a>
				<p><a href="#">{{$item->prod_name}}</a></p>
				<p class="price">{{number_format($item->prod_price,0,',','.')}} VNĐ</p>
				<div class="marsk">
					<a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">Xem chi tiết</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>

	<div class="products">
		<h3>sản phẩm mới</h3>
		<div class="product-list row">

			@foreach($news as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img width="100px" height="200px"
						src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}"></a>
				<p><a href="#">{{$item->prod_name}}</a></p>
				<p class="price">{{number_format($item->prod_price,0,',','.')}} VNĐ</p>
				<div class="marsk">
					<a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">Xem chi tiết</a>
				</div>
			</div>
			@endforeach

		</div>
	</div>
</div>

@stop