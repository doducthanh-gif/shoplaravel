@extends('layout')
@section('content')
<div class="fb-like" data-href="http://localhost/shopbanhanglaravel/danh-muc-san-pham/22" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
<div class="fb-share-button" data-href="http://localhost/shopbanhanglaravel" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>

<div class="features_items"><!--features_items-->


                        @foreach($category_name as $key => $name)
						<h2 class="title text-center">{{$name->category_name}}</h2> 
                        @endforeach
						@foreach($category_by_id as $key => $product)
						<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
											<h2>{{number_format($product->product_price).' '.'VND'}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<!-- <div class="product-overlay">
											<div class="overlay-content">
												<h2>{{number_format($product->product_price).' '.'VND'}}</h2>
												<p>{{$product->product_name}}</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div> -->
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						</a>
						@endforeach
					</div>features_items

@endsection
