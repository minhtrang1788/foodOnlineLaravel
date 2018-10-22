@extends('layouts.admin.app')
@section('content')
<!-- page content -->

         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="container-fluid">
                   <div class="x_panel" >
                   <h2 >All Slider images</h2>
                   @if(count($sliders))

                     <table class="table table-bordered" id="table_sliders">
                        <thead>
                           <tr>
                              <td>ID</td>
                              <td colspan="3">Image</td>
                              <td>Action</td>
                           </tr>
                        </thead>
                        @foreach($sliders as $slider)
                        <tr>
                           <td>{{$slider->id}}</td>
                           <td colspan="3"><img src="{{$slider->url}}" width="300px" height="100px"/></td>
                           <td><a href="/admin/deleteSlider/{{$slider->id}}" class="btn btn-xs btn-primary" onclick="javascript:return confirmDel()"><i class="glyphicon glyphicon-del"></i> Delete</a></td>

                        </tr>
                        @endforeach
                     </table>
                     @endif
                     </div>
                 </div>
             </div>
           </div>

@endsection
