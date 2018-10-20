<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shop Online admin! | </title>

    <!-- Bootstrap -->
    <link href="{{ url('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ url('admin/build/css/custom.min.css') }}" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
   <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />

  	<script type="text/javascript">
  		$(document).ready(function() {
        $('#table').DataTable({

            processing: true,
            serverSide: true,
            ajax: '{{url('admin/getProducts')}}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price' },
                { data: 'isActived', name: 'isActived' },
                { data: 'action', name: 'action' }
            ]
        });
  		});
      $(document).ready(function() {
        $('#table_posts').DataTable({

            processing: true,
            serverSide: true,
            ajax: '{{url('admin/getPosts')}}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'body', name: 'body' },
                { data: 'is_public', name: 'is_public' },
                { data: 'category', name: 'category' },
                { data: 'action', name: 'action' }
            ]
        });
  		});

      $(document).ready(function() {
        $('#table_users').DataTable({

            processing: true,
            serverSide: true,
            ajax: '{{url('admin/getUsers')}}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'body' },
                { data: 'about', name: 'about' },
                { data: 'role', name: 'role' },
                { data: 'action', name: 'action' }
            ]
        });
      });
      var $status = 0;
      $(document).ready(function() {
        $status = '/'+document.getElementById('status_order').value;
        $url = '{{url('admin/getOrders')}}'+$status;
        $('#table_orders').DataTable({
            processing: true,
            serverSide: true,
            ajax: $url,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'product', name: 'product' },
                { data: 'user', name: 'user' },
                { data: 'quantity', name: 'quantity' },
                { data: 'action', name: 'action' }
            ]
        });
      });
      function confirmDel(){
        alert('Do you want to delete?');
      }
  	</script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />
