<div class="col-md-3">
		<div class="blog-sidebar">
			<div class="block">
				<h4>Catagories</h4>
				<div class="list-group">
					@if(count($categories))
						@foreach($categories as $category)
					<a href="/viewPosts/{{$category->name}}" class="list-group-item">
						<i class="fa  fa-dot-circle-o"></i>
							{{$category->name}}
					</a>
						@endforeach
					@endif

				</div>
			</div>
			<div class="block">
				<img src="images/food-ad.png" alt="">
			</div>
			<div class="block">
				<h4>Latest Food Items</h4>
				<ul class="media-list">
					@if(count($products))
						@foreach ($products as $product)
						<?php
							$image = $product->Image;
						?>
				 	<li class="media">
				    	<a class="pull-left" href="/viewProduct/{{$product->slug}}">
				      		<img class="media-object" src="/{{$image->url}}" alt="...">
				    	</a>
				    	<div class="media-body">
				      		<a href="/viewProduct/{{$product->slug}}" class="media-heading">{{$product->name}}
				      		<p>{{$product->desc}}</p></a>
				    	</div>
				  	</li>
				  	@endforeach
					@endif
				  </ul>
			</div>

			<div class="block">
				<h4>Food Tag</h4>
				<div class="tag-link">
					@if(count($tags))
						@foreach($tags as $tag)
							<a href="/viewTagProduct/{{$tag->name}}">{{$tag->name}}</a>
						@endforeach
					@endif
				</div>
			</div>
	</div>	<!-- End of /.col-md-3 -->
