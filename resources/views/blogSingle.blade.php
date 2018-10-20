@extends('layouts.client.app')
@section('content')
<!-- Breadcrumbs Start
    ================================================== -->

	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1>BLOG</h1>
					<p>Latest News and Musings</p>
				</div>	<!-- End of /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="#">Home</a></li>
					  	<li><a href="#">Blog</a></li>
					  	<li class="active">Single Post</li>
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
					    <li>
					        <div class="blog-icon">
					        	<i class="fa  fa-pencil"></i>
					        </div>

									@if(count($post))
										<?php $c = $post->Category;
												$u = $post->User;
												$comments = $post->Comment;
												$img = $post->Image;
												?>
					        <div class="blog-box">
					        	<img src="/{{$img->url}}" alt="">

					            <div class="blog-post-body clearfix">
						            <a href="">
					            		<h2>{{$post->name}}</h2>
						            </a>
					            	<div class="blog-post-tag">
						            	<div class="block">
						            		<i class="fa fa-clock-o"></i>
						            		<p>{{$post->created_at}}</p>
						            	</div>

						            	<div class="block">
						            		<i class="fa fa-user"></i>
						            		<p>{{$u->name}}
															</p>
						            	</div>
						            	<div class="block">
						            		<i class="fa fa-tags"></i>
						            		<p>
						            			<a href="">{{$c->name}}</a>
						            		</p>
						            	</div>
						            	<div class="block">
						            		<i class="fa fa-comments"></i>
						            		<p>{{count($comments)}} Comment(s)</p>
						            	</div>
						            </div>
						            <p>{{$post->body}}</p>


					            </div>
					        </div>
									@endif
					    </li>
					</ul>	<!-- End of /.blog-zone -->

					<div class="author-id">
						<div class="media">
							<h5>About The Author</h5>
						  	<img class="media-object pull-left" src="/{{$u->avatar}}" alt="...">
						  	<div class="media-body">
						    	<h6 class="media-heading">{{$u->name}}</h6>
						    	<p>{{$u->about}}</p>
						    </div>	<!-- End of /.media-body -->
						</div>	<!-- End of /.media -->
					</div>	<!-- End of /.author-id -->
					@if(count($comments))

					<div class="comments-box">
						<h5>3 REPSONSES</h5>
							@foreach($comments as $comment)
							<?php $userComment = $comment->User; ?>
						<div class="media">
						  	<img class="media-object pull-left" src="/{{$userComment->avatar}}" alt="...">
						  	<div class="media-body">
						    	<h6 class="media-heading">{{$userComment->name}} <span>{{$comment->created_at}}</span> <a href=""  class="pull-right">(reply)</a></h6>
						    	<p>{{$comment->body}}</p>
						    </div>	<!-- End of /.meida-body -->
						</div>	<!-- End of /.media -->


						<!-- reply -->
						<div class="media reply">
						  	<img class="media-object pull-left" src="images/author.jpg" alt="...">
						  	<div class="media-body">
						    	<h6 class="media-heading">John Mark <span>12 February 2013 at 2:05 am</span> <a href=""  class="pull-right">(reply)</a></h6>
						    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, sequi quibusdam voluptate perferendis </p>
						    </div>
						</div>
						@endforeach


					</div>	<!-- End of /.comments-box -->
					@endif
					<div class="leave-comment">
						<h5>LEAVE A COMMENT</h5>
							{{Form::open(array('url'=>'/comment','method' => 'post','role'=>'form','class'=>'form-horizontal'))}}
							{{Form::hidden('user_id',auth()->id())}}
							{{Form::hidden('post_id',$post->id)}}
						  	<div class="form-group">
						    	<label for="inputmessage" class="col-sm-2 control-label">Message</label>
							    <div class="col-sm-10">
											{{Form::textarea('body','',array('class'=>'form-control','id'=>'inputmessage','rows'=>'3')) }}
							    </div>
						  	</div>	<!-- End of /.form-group -->

							<div class="form-group">
						    	<div class="col-sm-offset-2 col-sm-10">
										{{Form::submit('Send',array('id'=>'btn btn-primary'))}}
						    	</div>
						  	</div>	<!-- End of /.form-group -->
						{{Form::close()}}	<!-- End of /.form-horizontal -->
					</div>	<!-- End of /.leave comments -->
				</div>	<!-- End of /.col-md-9 -->
        @include('inc.sitebar')
  @endsection
