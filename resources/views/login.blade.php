@extends('layouts.client.app')
@section('content')
<section id="topic-header">
  <div class="container">
    <div class="row" >
      <div class="col-md-4">
        <h1>LOGIN</h1>
      </div>	<!-- End of /.col-md-4 -->
      <div class="col-md-8 hidden-xs">
        <ol class="breadcrumb pull-right">
            <li><a href="#">Home</a></li>
            <li class="active">Login</li>
        </ol>
      </div>	<!-- End of /.col-md-8 -->
    </div>	<!-- End of /.row -->
  </div>	<!-- End of /.container -->
</section>	<!-- End of /#Topic-header -->
<div class="container">
  <div class="row">
    @if (Auth::guest())
		<div class="col-sm-4 col-sm-offset-1">
			<div class="login-form"><!--login form-->
				<h2>Login to your account</h2>
				{{Form::open(array('url'=>'/loginClient'))}}
        {{Form::text('email','',array('placeholder'=>'email'))}}
        {{Form::password('password','',array('placeholder'=>'Password'))}}
					<span>
            {{Form::checkbox('isSignedIn','',array('class'=>'checkbox'))}}
            Keep me signed in
					</span>
          {{Form::submit('Login',array('class'=>'btn btn-default'))}}
				 {{Form::close()}}
			</div><!--/login form-->
		</div>
		<div class="col-sm-1">
			<h2 class="or">OR</h2>
		</div>
		<div class="col-sm-4">
			<div class="signup-form"><!--sign up form-->
				<h2>New User Signup!</h2>
				{{Form::open(array('url'=>'/signupClient'))}}
        {{Form::text('name','',array('placeholder'=>'Name'))}}
        {{Form::text('email','',array('placeholder'=>'Email Address'))}}
        {{Form::password('password','',array('placeholder'=>'Password'))}}
        {{Form::submit('SignUp',array('class'=>'btn btn-default'))}}
       {{Form::close()}}
			</div><!--/sign up form-->
		</div>
    @else
      <div class="col-sm-offset-1" style="text-align:center">
        <h3>Hello {{auth()->user()->name}}, Welcome to Food code!</h3>
      </div>
    @endif
    @endsection
