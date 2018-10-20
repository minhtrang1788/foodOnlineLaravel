<!-- SLIDER Start
  ================================================== -->


<section id="slider-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="slider" class="nivoSlider">
          @if(count($sliders))
            @foreach($sliders as $slide)
            <img src="{{$slide->url}}" alt="" />
            @endforeach
          @endif
        </div>	<!-- End1 of /.nivoslider -->
      </div>	<!-- End of /.col-md-12 -->
    </div>	<!-- End of /.row -->
  </div>	<!-- End of /.container -->
</section> <!-- End of Section -->



<!-- FEATURES Start
  ================================================== -->

<section id="features">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="block">
          <div class="media">
            <div class="pull-left" href="#">
                <i class="fa fa-ambulance"></i>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Free Shipping</h4>
                <p>Lorem ipsum dolor sit amet, consectetur.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="block">
          <div class="media">
            <div class="pull-left" href="#">
              <i class=" fa fa-foursquare"></i>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                <p>Lorem ipsum dolor sit amet, consectetur.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="block">
          <div class="media">
            <div class="pull-left" href="#">
                <i class=" fa fa-phone"></i>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Call Us</h4>
                <p>Lorem ipsum dolor sit amet, consectetur.</p>
            </div>	<!-- End of /.media-body -->
          </div>	<!-- End of /.media -->
        </div>	<!-- End of /.block -->
      </div> <!-- End of /.col-md-4 -->
    </div>	<!-- End of /.row -->
  </div>	<!-- End of /.container -->
</section>	<!-- End of section -->



<!-- CATAGORIE Start
  ================================================== -->

<section id="catagorie">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <div class="block-heading">
            <h2>OUR FOOD CATEGORIES</h2>
          </div>
          <div class="row">
              @if(count($posts))
                @foreach($posts as $post)

              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <a class="catagotie-head" href="/singleblog/{{$post->slug}}">

                      <img src="{{$post->Image->url}}" alt="...">
                  <h3>{{$post->name}}</h3>
                </a>
                    <div class="caption">
                      <p>{{$post->body}}</p>
                      <p>
                        <a href="/singleblog/{{$post->slug}}" class="btn btn-default btn-transparent" role="button" >
                          <span>Check Items</span>
                        </a>
                      </p>
                    </div>	<!-- End of /.caption -->
                </div>	<!-- End of /.thumbnail -->
              </div>	<!-- End of /.col-sm-6 col-md-4 -->
              @endforeach
            @endif
          </div>	<!-- End of /.row -->
        </div>	<!-- End of /.block -->
      </div>	<!-- End of /.col-md-12 -->
    </div>	<!-- End of /.row -->
  </div>	<!-- End of /.container -->
</section>	<!-- End of Section -->




  <!-- PRODUCTS Start
  ================================================== -->

<section id="products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="products-heading">
          <h2>NEW PRODUCTS</h2>
        </div>
      </div>
    </div>
    <div class="row">
      @if(count($products))
        @foreach ($products as $product)
        <?php
          $image = $product->Image;
        ?>
      <div class="col-md-3">
        <div class="products">
          <a href="/viewProduct/{{$product->slug}}">
            <img src="/{{$image->url}}" alt="">
          </a>
          <a href="/viewProduct/{{$product->slug}}">
            <h4>{{$product->name}}</h4>
          </a>
          <p class="price">From: £{{$product->price}}</p>
          <a class="view-link shutter" onclick="javascript:return addToCart('{{$product->slug}}')">
            <i class="fa fa-plus-circle"></i>Add To Cart</a>
        </div>	<!-- End of /.products -->
      </div>	<!-- End of /.col-md-3 -->
      @endforeach
    @endif
    </div>	<!-- End of /.row -->
  </div>	<!-- End of /.container -->
</section>	<!-- End of Section -->




  <!-- CALL TO ACTION Start
  ================================================== -->

<section id="call-to-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <div class="block-heading">
            <h2>Our Partners</h2>
          </div>
        </div>	<!-- End of /.block -->
        <div id="owl-example" class="owl-carousel">
          @if(count($partners))
            @foreach($partners as $partner)
            <div> <img src="{{$partner->url}}" alt=""></div>
            @endforeach
          @endif

        </div>	<!-- End of /.Owl-Slider -->
      </div>	<!-- End of /.col-md-12 -->
    </div> <!-- End Of /.Row -->
  </div> <!-- End Of /.Container -->
</section>	<!-- End of Section -->
