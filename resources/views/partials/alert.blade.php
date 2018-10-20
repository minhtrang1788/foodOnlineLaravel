@if(isset($errors))
  @foreach($errors->all() as $msg)
    <div class="alert alert-danger" role="alert">
      {{$msg}}
    </div>
  @endforeach
@endif
@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
