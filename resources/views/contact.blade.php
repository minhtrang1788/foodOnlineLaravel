@extends('layouts.client.app')
@section('content')
<section id="topic-header">
  <div class="container">
    <div class="row" >
      <div class="col-md-4">
        <h1>CONTACT</h1>
      </div>	<!-- End of /.col-md-4 -->
      <div class="col-md-8 hidden-xs">
        <ol class="breadcrumb pull-right">
            <li><a href="#">Home</a></li>
            <li class="active">Contact</li>
        </ol>
      </div>	<!-- End of /.col-md-8 -->
    </div>	<!-- End of /.row -->
  </div>	<!-- End of /.container -->
</section>	<!-- End of /#Topic-header -->
  <div class="container" id="contact-page">
    <div class="row" >
      <div class="col-sm-8" >

    			<div class="contact-form" >
    				<h2 class="title text-center">Get In Touch</h2>
    				<div class="status alert alert-success" style="display: none"></div>
              {{Form::open(array('url'=>'/contact','id'=>'main-contact-form','class'=>'contact-form row','name'=>'contact-form'))}}
			            <div class="form-group col-md-6">
                      {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Name'))}}
			            </div>
			            <div class="form-group col-md-6">
                      {{Form::text('email','',array('class'=>'form-control','placeholder'=>'Email'))}}
			            </div>
			            <div class="form-group col-md-12">
                      {{Form::text('subject','',array('class'=>'form-control','placeholder'=>'Subject'))}}

			            </div>
			            <div class="form-group col-md-12">
                      {{Form::text('message','',array('id'=>'message','class'=>'form-control','placeholder'=>'Subject','rows'=>'8'))}}

			            </div>
			            <div class="form-group col-md-12">
                      {{Form::submit('submit',array('class'=>'btn btn-primary pull-right','value'=>'submit'))}}
			            </div>
			        </form>
    			</div>
    		</div>
    		<div class="col-sm-4">
    			<div class="contact-info">
    				<h2 class="title text-center">Contact Info</h2>
    				<address>
    					<p>E-Shopper Inc.</p>
						<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
						<p>Newyork USA</p>
						<p>Mobile: +2346 17 38 93</p>
						<p>Fax: 1-714-252-0026</p>
						<p>Email: info@e-shopper.com</p>
    				</address>
    				<div class="social-networks">
    					<h2 class="title text-center">Social Networking</h2>
						<ul>
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-youtube"></i></a>
							</li>
						</ul>
    				</div>
    			</div>
  			</div>
    @endsection
