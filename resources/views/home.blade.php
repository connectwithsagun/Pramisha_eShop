@extends('includes/layout')

@section('content')




	<!-- banner -->
	<div class="banner">
		<div class="container">
			<h3>Electronic Store, <span>Special Offers</span></h3>
		</div>
	</div>
	<!-- //banner --> 
	<!---728x90--->

	<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			{{-- <div class="col-md-5 wthree_banner_bottom_left">
				<div class="video-img">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog">
						<span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
					</a>
				</div> 
					<!-- pop-up-box -->     
					<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
					<!--//pop-up-box -->
					<div id="small-dialog" class="mfp-hide">
						<iframe src="https://www.youtube.com/embed/ZQa6GUVnbNM"></iframe>
					</div>
					<script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
					</script>
			</div> --}}
			<div >
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab" aria-controls="home">All</a></li>

						@foreach ($categories as $cate)

						<li role="presentation" ><a href="#category{{ $cate ->id }}" role="tab" data-toggle="tab" aria-controls="home">{{ $cate -> name}}</a></li>

						@endforeach
						{{-- <li role="presentation" class="active"><a href="electronic_product" role="tab" data-toggle="tab" aria-controls="home">Electronics</a></li>

						<li role="presentation"><a href="#audio" role="tab" id="audio-tab" data-toggle="tab" aria-controls="audio">Audio</a></li>
						<li role="presentation"><a href="#video" role="tab" id="video-tab" data-toggle="tab" aria-controls="video">Computer</a></li>
						<li role="presentation"><a href="#tv" role="tab" id="tv-tab" data-toggle="tab" aria-controls="tv">Household</a></li>
						<li role="presentation"><a href="#kitchen" role="tab" id="kitchen-tab" data-toggle="tab" aria-controls="kitchen">Kitchen</a></li> --}}


					</ul>
					<div id="myTabContent" class="tab-content">

						@foreach ($categories as $cate)

						<div role="tabpanel" class="tab-pane fade active in" id="category{{ $cate ->id }}" aria-labelledby="home-tab">
							<div class="agile_ecommerce_tabs" >
								<div class="row row-margin-05">

								@php
									$catewiseproduct = App\Models\Product::where('category_id',$cate->id)
									->orderBy('id','DESC')->get();
								@endphp

								@foreach ($catewiseproduct as $item)
								
								<div class="col-md-3 agile_ecommerce_tab_left">
									<div class="hs-wrapper">

									
										<img src="{{ $item->image == ' ' ? 'https://via.placeholder.com/300x450': image_crop($item->image) }}" alt=" " class="img-responsive" />

					
									</div> 
									<h5><a href="single_product/{{ $item->id }}">{{ $item->product_name }}</a></h5>

									<div class="simpleCart_shelfItem">
										<p><span>Rs. {{ $item->old_price }}</span> <i class="item_price">Rs. {{ $item->price }}</i></p>
										<form action="addCart" method="post">
											@csrf
									
											<input type="hidden" name="product_id" value="{{ $item->id }}" /> 

											<button type="submit" class="w3ls-cart">Add to cart</button>
										</form>  
									</div>
								</div>
								
								@endforeach

								</div>
								



								<div class="clearfix"> </div>
							</div>
						</div>
						@endforeach




						 <div role="tabpanel" class="tab-pane fade" id="all" aria-labelledby="audio-tab">
							<div class="agile_ecommerce_tabs">
								@foreach ($products as $item)
								
								<div class="col-md-3 agile_ecommerce_tab_left">
									<div class="hs-wrapper">
										<img src="{{ $item->image == ' ' ? 'https://via.placeholder.com/300x450': image_crop($item->image) }}" alt=" " class="img-responsive" />
									
							
									</div> 
									<h5><a href="/single_product">{{ $item->product_name }}</a></h5>
									<h6><a href="/single_product">{{ $item->category->name }}</a></h6>

									<div class="simpleCart_shelfItem">
										<p><span>Rs. {{ $item->old_price }}</span> <i class="item_price">Rs. {{ $item->price }}</i></p>
										<form action="addCart" method="post">
											@csrf
									
											<input type="hidden" name="product_id" value="{{ $item->id }}" /> 

											<button type="submit" class="w3ls-cart">Add to cart</button>
										</form>   
									</div>
								</div>
								@endforeach
								<div class="clearfix"> </div>
							</div>
						</div>



					</div>
				</div> 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>



	
	<!-- //banner-bottom --> 
	<!---728x90--->

	<!-- banner-bottom1 -->
	<div class="banner-bottom1">
		<div class="agileinfo_banner_bottom1_grids">
			<div class="col-md-7 agileinfo_banner_bottom1_grid_left">
				<h3>Grand Opening Event With flat<span>20% <i>Discount</i></span></h3>
				<a href="/products">Shop Now</a>
			</div>
			<div class="col-md-5 agileinfo_banner_bottom1_grid_right">
				<h4>hot deal</h4>
				<div class="timer_wrap">
					<div id="counter"> </div>
				</div>
				<script src="js/jquery.countdown.js"></script>
				<script src="js/script.js"></script>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //banner-bottom1 --> 
	<!---728x90--->
	<!-- special-deals -->
	<div class="special-deals">
		<div class="container">
			<h2>Special Deals</h2>
			<div class="w3agile_special_deals_grids">
				<div class="col-md-7 w3agile_special_deals_grid_left">
					<div class="w3agile_special_deals_grid_left_grid">
						<img src="images/45.jpg" alt=" " class="img-responsive" />
						<div class="w3agile_special_deals_grid_left_grid_pos1">
							<h5>30%<span>Off/-</span></h5>
						</div>
						<div class="w3agile_special_deals_grid_left_grid_pos">
							<h4>We Offer <span>Best Products</span></h4>
						</div>
					</div>
					<div class="wmuSlider example1">
						<div class="wmuSliderWrapper">
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="images/t1.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Laura</h4>
									</div>
								</div>
							</article>
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="images/t2.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Michael</h4>
									</div>
								</div>
							</article>
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="images/t3.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Rosy</h4>
									</div>
								</div>
							</article>
						</div>
					</div>
						<script src="js/jquery.wmuSlider.js"></script> 
						<script>
							$('.example1').wmuSlider();         
						</script> 
				</div>
				<div class="col-md-5 w3agile_special_deals_grid_right">
					<img src="images/20.jpg" alt=" " class="img-responsive" />
					<div class="w3agile_special_deals_grid_right_pos">
						<h4>Women's <span>Special</span></h4>
						<h5>save up <span>to</span> 30%</h5>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //special-deals -->
	<!-- new-products -->
	<div class="new-products">
		<div class="container">
			<h3>New Products</h3>
			<div class="agileinfo_new_products_grids">

				@php
				$newproduct = App\Models\Product::all()->take(4);
				@endphp
			

			@foreach ($newproduct as $item)

			<div class="col-md-3 agileinfo_new_products_grid">
				<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">

					

					<div class="hs-wrapper hs-wrapper1">
						{{-- <img src="images/4.jpg" alt=" " class="img-responsive" /> --}}

						<img src="{{ $item->image == ' ' ? 'https://via.placeholder.com/300x450': image_crop($item->image) }}" alt=" " class="img-responsive" />


						{{-- <img src="images/4.jpg" alt=" " class="img-responsive" />
						<img src="images/4.jpg" alt=" " class="img-responsive" />
						<img src="images/4.jpg" alt=" " class="img-responsive" />
						<img src="images/4.jpg" alt=" " class="img-responsive" />  --}}
						{{-- <div class="w3_hs_bottom w3_hs_bottom_sub">
							<ul>
								<li>
									<a href="#" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
								</li>
							</ul>
						</div> --}}
					</div>
					<h5><a href="single_product/{{ $item->id }}">{{ $item->product_name }}</a></h5>
					<h6><a href="/single_product">{{ $item->category->name }}</a></h6>

					<div class="simpleCart_shelfItem">
						<p><span>Rs. {{ $item->old_price }}</span> <i class="item_price">Rs. {{ $item->price }}</i></p>
						<form action="#" method="post">
							<input type="hidden" name="cmd" value="_cart" />
							<input type="hidden" name="add" value="1" /> 
							<input type="hidden" name="w3ls_item" value="{{ $item->product_name }}" /> 
							<input type="hidden" name="amount" value="{{ $item->price }}" />   
							<button type="submit" class="w3ls-cart">Add to cart</button>
						</form>  
					</div>
				</div>

			</div>

			@endforeach
	


				{{-- <div class="col-md-3 agileinfo_new_products_grid">
					<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
						<div class="hs-wrapper hs-wrapper1">
							<img src="images/4.jpg" alt=" " class="img-responsive" />
							<img src="images/4.jpg" alt=" " class="img-responsive" />
							<img src="images/4.jpg" alt=" " class="img-responsive" />
							<img src="images/4.jpg" alt=" " class="img-responsive" />
				
							<div class="w3_hs_bottom w3_hs_bottom_sub">
								<ul>
									<li>
										<a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</li>
								</ul>
							</div>
						</div>
						<h5><a href="single.html">Black Phone</a></h5>
						<div class="simpleCart_shelfItem">
							<p><span>$380</span> <i class="item_price">$370</i></p>
							<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								<input type="hidden" name="w3ls_item" value="Black Phone"> 
								<input type="hidden" name="amount" value="370.00">   
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>
					</div>
				</div> --}}


				{{-- <div class="col-md-3 agileinfo_new_products_grid">
					<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
						<div class="hs-wrapper hs-wrapper1">
							<img src="images/4.jpg" alt=" " class="img-responsive" />
							<img src="images/4.jpg" alt=" " class="img-responsive" />
							<img src="images/4.jpg" alt=" " class="img-responsive" />
							<img src="images/4.jpg" alt=" " class="img-responsive" />
							<img src="images/4.jpg" alt=" " class="img-responsive" />
														
							<div class="w3_hs_bottom w3_hs_bottom_sub">
								<ul>
									<li>
										<a href="#" data-toggle="modal" data-target="#myModal5"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</li>
								</ul>
							</div>
						</div>
						<h5><a href="single.html">Kids Toy</a></h5>
						<div class="simpleCart_shelfItem">
							<p><span>$150</span> <i class="item_price">$100</i></p>
							<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								<input type="hidden" name="w3ls_item" value="Kids Toy"> 
								<input type="hidden" name="amount" value="100.00">   
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>  
					</div>
				</div> --}}


				{{-- <div class="col-md-3 agileinfo_new_products_grid">
					<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
						<div class="hs-wrapper hs-wrapper1">
							<img src="images/4.jpg" alt=" " class="img-responsive" />
										<img src="images/4.jpg" alt=" " class="img-responsive" />
										<img src="images/4.jpg" alt=" " class="img-responsive" />
										<img src="images/4.jpg" alt=" " class="img-responsive" />
										<img src="images/4.jpg" alt=" " class="img-responsive" />
										
										
							<div class="w3_hs_bottom w3_hs_bottom_sub">
								<ul>
									<li>
										<a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</li>
								</ul>
							</div>
						</div>
						<h5><a href="single.html">Induction Stove</a></h5>
						<div class="simpleCart_shelfItem">
							<p><span>$280</span> <i class="item_price">$250</i></p>
							<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								<input type="hidden" name="w3ls_item" value="Induction Stove"> 
								<input type="hidden" name="amount" value="250.00">   
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>
					</div>
				</div> --}}

				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //new-products -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Top Brands</h3>
			<div class="sliderfig">
				<ul id="flexiselDemo1">			
					<li>
						<img src="images/tb1.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb2.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb3.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb4.jpg" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/tb5.jpg" alt=" " class="img-responsive" />
					</li>
				</ul>
			</div>
			<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
	<!-- //top-brands --> 



	
@endsection