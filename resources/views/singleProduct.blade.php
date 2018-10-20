@extends('layouts.client.app')
@section('content')
<!-- breadcrumb Start
    ================================================== -->

	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1>Products Details</h1>
					<p></p>
				</div>	<!-- /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="#">Home</a></li>
					  	<li><a href="#">Products</a></li>
					  	<li class="active">Single Products</li>
					</ol>
				</div> <!-- /.col-md-8 -->
			</div>	<!-- /.row -->
		</div>	<!-- /.container-->
	</section><!-- /Section -->




	<section id="single-product">
		<div class="container">
			<div class="row">
				@if($product)
					<?php $image = $product->image?>
				<div class="col-md-5">
					<div class="single-product-img" style="align:center">
						<img src="/{{$image->url}}" alt="">
					</div>

				</div> <!-- End of /.col-md-5 -->
				<div class="col-md-4">
					<div class="block">
						<div class="product-des">
							<h4>{{$product->name}}</h4>
							<p class="price">${{$product->price}}</p>
							<p>{{$product->body}}</p>
							<a class="view-link"  onclick="javascript:return addToCart('{{$product->slug}}')"><i class="fa fa-plus-circle"></i>Add To Cart</a>
						</div>	<!-- End of /.product-des -->
					</div> <!-- End of /.block -->
				</div>	<!-- End of /.col-md-4 -->
				@endif
        @include('inc.sitebar')
  @endsection
