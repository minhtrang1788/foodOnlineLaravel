@extends('layouts.admin.app')
@section('content')
<!-- page content -->

          <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="container-fluid">
                   <div class="x_panel">
                   <h2>All products</h2>
                   
                    {{Form::open(array('class'=>'form-horizontal form-label-left','method'=>'post','enctype'=>'multipart/form-data'))}}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Input name'))}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Body</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          {{Form::textarea('body','',array('class'=>'form-control','placeholder'=>'Input body','rows'=>'3'))}}

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="category">
                            <option selected>Choose...</option>
                            <option value="1">Traditional Food</option>
                            <option value="2">Italian Food</option>
                            <option value="3">India Food</option>
                            <option value="4">Spanish Food</option>
                            <option value="5">Thai Food</option>
                          </select>
                        </div>
                    </div>


                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                    <div class="btn-group">
                        <a class="btn" title="Insert picture (or just drag &amp; drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>

                        {{Form::file('post_image',array('data-role'=>'magic-overlay','data-target'=>'#pictureBtn','id'=>'image_hash'))}}
                    </div>
                    </div>


                    <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        {{Form::submit('Create',array('class'=>'btn btn-success'))}}

                    </div>
                    </div>

                        {{Form::close()}}
                     </div>
                 </div>
             </div>
           </div>


@endsection
