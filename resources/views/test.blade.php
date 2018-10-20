<html>
<head>
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
              { data: 'price', name: 'price' }
          ]
      });
		});
	</script>
</head>
<body>
  <table id="table">
  <thead>
  <tr>
    <td>id</td>
    <td>name</td>
    <td>price</td>
      </tr>
  </thead>
  <tbody>
  </tbody>

</body>
</html>
