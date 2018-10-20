@extends('layouts.admin.app')
@section('content')
<!-- page content -->

         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="container-fluid">
                   <div class="x_panel">
                   <h2>All Users</h2>
                     <table class="table table-bordered" id="table_users">
                        <thead>
                           <tr>
                              <td>ID</td>
                              <td>Name</td>
                              <td>Email</td>
                              <td>About</td>
                              <td>Role</td>
                              <td>Action</td>
                           </tr>
                        </thead>
                     </table>
                     </div>
                 </div>
             </div>
           </div>

@endsection
