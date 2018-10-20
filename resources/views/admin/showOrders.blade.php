@extends('layouts.admin.app')
@section('content')
<!-- page content -->

         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="container-fluid">
                   <div class="x_panel" >
                   <h2 >All Orders</h2>
                   @if(!isset($status)) $status = 1;
                   @endif
                   <input type="hidden" id="status_order"  value="{{$status}}">
                     <table class="table table-bordered" id="table_orders">
                        <thead>
                           <tr>
                              <td>ID</td>
                              <td>Product</td>
                              <td>User</td>
                              <td>Quantity</td>
                              <td>Action</td>
                           </tr>
                        </thead>
                     </table>
                     </div>
                 </div>
             </div>
           </div>

@endsection
