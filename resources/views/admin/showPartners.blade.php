@extends('layouts.admin.app')
@section('content')
<!-- page content -->

         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="container-fluid">
                   <div class="x_panel" >
                   <h2 >All Slider images</h2>
                   @if(count($partners))

                     <table class="table table-bordered" id="table_sliders">
                        <thead>
                           <tr>
                              <td>ID</td>
                              <td colspan="3">Image</td>
                              <td>Action</td>
                           </tr>
                        </thead>
                        @foreach($partners as $partner)
                        <tr>
                           <td>{{$partner->id}}</td>
                           <td colspan="3"><img src="{{$partner->url}}" width="200px" height="80px"/></td>
                           <td><a href="/admin/deletePartner/{{$partner->id}}" class="btn btn-xs btn-primary" onclick="javascript:return confirmDel()"><i class="glyphicon glyphicon-del"></i> Delete</a></td>

                        </tr>
                        @endforeach
                     </table>
                     @endif
                     </div>
                 </div>
             </div>
           </div>

@endsection
