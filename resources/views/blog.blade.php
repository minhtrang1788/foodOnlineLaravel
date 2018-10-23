@extends('layouts.client.app')
@section('content')


<!-- Breadcrumbs Start
    ================================================== -->

	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1>BLOG</h1>
					<p>Latest News</p>
				</div>	<!-- End of /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="#">Home</a></li>
					  	<li class="active">Blog</li>
					</ol>
				</div>	<!-- End of /.col-md-8 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of /#Topic-header -->


	<section id="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-9 clearfix">
					<ul class="blog-zone">
						@if(count($posts))
							@foreach($posts as $post)
							<?php
									$user = $post->User;
									$cat = $post->Category;
									$img = $post->Image;
									$comments = $post->Comment;
							 ?>
					    <li>
					        <div class="blog-icon">
					        	<i class="fa  fa-pencil"></i>
					        </div>
					        <div class="blog-box">
					        	<img src="/{{$img->url}}" alt="">

					            <div class="blog-post-body clearfix">
						            <a href="/singleblog/{{$post->slug}}">
					            		<h2>{{$post->name}}</h2>
						            </a>
					            	<div class="blog-post-tag">
						            	<div class="block">
						            		<i class="fa fa-clock-o"></i>
						            		<p>{{$post->create_at}}</p>
						            	</div>
						            	<div class="block">
						            		<i class="fa fa-user"></i>
						            		<p>{{$user->name}}</p>
						            	</div>
						            	<div class="block">
						            		<i class="fa fa-tags"></i>
						            		<p>
						            			<a href="">{{$cat->name}}</a>
						            		</p>
						            	</div>
						            	<div class="block">
						            		<i class="fa fa-comments"></i>
						            		<p>{{count($comments)}} Comment/s</p>
						            	</div>
						            </div>
						            <p>{{$post->body}}</p>
						            <a href="/singleblog/{{$post->slug}}" class="btn btn-default btn-transparent pull-right" role="button">
								        <span>Read More</span>
								    </a>
					            </div>
					        </div>	<!-- End of /.blog-box -->
					    </li>
								@endforeach
							@else
								<li>No post for this food Cultural!</li>
							@endif
					  </ul>	<!-- End of /.blog-zone -->

					<!-- Pagination -->
					 <ul class="pagination pull-right">
					  	<li class="disabled">@if (isset($posts)){{($posts->links())}} @endif</li>
					</ul>	<!-- End of /.pagination -->
				</div>	<!-- End of /.col-md-9 -->

			  @include('inc.sitebar')
@endsection
