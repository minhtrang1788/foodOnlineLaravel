<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Food Code Proudly Presents By Themexpert</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
	<!-- Css -->
  <link href="{{ url('css/nivo-slider.css') }}" rel="stylesheet">
  <link href="{{ url('css/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ url('css/owl.theme.css') }}" rel="stylesheet">
  <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ url('css/style.css') }}" rel="stylesheet">
  <link href="{{ url('css/responsive.css') }}" rel="stylesheet">

	<!-- jS -->
	<script src="{{ url('js/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
  <script src="{{ url('js/owl.carousel.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <script src="{{ url('js/jquery.scrollUp.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('js/main.js') }}" type="text/javascript"></script>
	  <script src="{{ url('js/foodOnline.js') }}" type="text/javascript"></script>

	 <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>


<!-- TOP HEADER Start
    ================================================== -->

	<section id="top">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<p class="contact-action"><i class="fa fa-phone-square"></i>IN CASE OF ANY QUESTIONS, CALL THIS NUMBER: <strong>+565 975 658</strong></p>
				</div>
				<div class="col-md-3 clearfix">
					<ul class="login-cart">

						@if(Auth::guest())
						<li>
							<a href="/loginClient">
							<i class="fa fa-user"></i>
								Login
							</a>
						</li>
						@else
						<li>
							Hello {{Auth()->user()->name}}
							<a href="/logout">
							<i class="fa fa-user"></i>
								Logout
							</a>
						</li>
						@endif
						<li>
							<div class="cart dropdown">
						  		<a  href="/cart"><i class="fa fa-shopping-cart"></i>Cart</a>

							</div>
						</li>
					</ul>
				</div>
				<div class="col-md-2">
					<div class="search-box">
						<div class="input-group">
					    	<input placeholder="Search Here" type="text" class="form-control">
					      	<span class="input-group-btn">
					        	<button class="btn btn-default" type="button"></button>
					      	</span>
					    </div><!-- /.input-group -->
					</div><!-- /.search-box -->
				</div>
			</div> <!-- End Of /.row -->
		</div>	<!-- End Of /.Container -->


	<!-- MODAL Start
    	================================================== -->

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
		    	<div class="modal-content">
		    		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        		<h4 class="modal-title" id="myModalLabel">Introduce Yourself</h4>
		      		</div>
			      	<div class="modal-body clearfix">

						<form action="#" method="post" id="create-account_form" class="std">
							<fieldset>
								<h3>Create your account</h3>
								<div class="form_content clearfix">
									<h4>Enter your e-mail address to create an account.</h4>
									<p class="text">
										<label for="email_create">E-mail address</label>
										<span>
											<input placeholder="E-mail address"  type="text" id="email_create" name="email_create" value="" class="account_input">
					                    </span>
									</p>
									<p class="submit">
										<button class="btn btn-primary">Create Your Account</button>
									</p>
								</div>
							</fieldset>
						</form>
			      		<form action="" method="post" id="login_form" class="std">
							<fieldset>
								<h3>Already registered?</h3>
								<div class="form_content clearfix">
									<p class="text">
									<label for="email">E-mail address</label>
										<span><input placeholder="E-mail address" type="text" id="email" name="email" value="" class="account_input"></span>
									</p>
									<p class="text">
									<label for="passwd">Password</label>
										<span><input placeholder="Password" type="password" id="passwd" name="passwd" value="" class="account_input"></span>
									</p>
									<p class="lost_password">
										<a href="#popab-password-reset" class="popab-password-link">Forgot your password?</a>
									</p>
									<p class="submit">
										<button class="btn btn-success">Log in</button>
									</p>
								</div>
							</fieldset>
						</form>
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      	</div>
		    	</div>
		  	</div>
		</div>
	</section>  <!-- End of /Section -->



	<!-- LOGO Start
    ================================================== -->

	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="#">
						<img src="/images/logo.png" alt="logo">
					</a>
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</header> <!-- End of /Header -->




	<!-- MENU Start
    ================================================== -->
