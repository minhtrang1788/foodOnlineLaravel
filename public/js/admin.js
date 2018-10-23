
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
    try {
   // Sử dụng biến message chưa được định nghĩa
      $status = '/'+document.getElementById('status_order').value;
   } catch (e){
        $status = 0;
       console.log('error get status');
   }

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
