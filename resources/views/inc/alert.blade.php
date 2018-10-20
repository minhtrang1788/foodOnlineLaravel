@if(isset($errors))
  @foreach($errors->all() as $msg)
    <div class="alert alert-danger" role="alert">
      {{$msg}}
    </div>
  @endforeach
@endif
@if(isset($messages))
  @foreach($messages as $msg)
    <div class="alert alert-danger" role="alert">
      {{$msg}}
    </div>
  @endforeach
@endif
<div class="alert alert-info" role="alert" id="cart_alert">
  <a onClick="javascript: return exit_alert()" class="exit_alert">x</a>
  <p id="msg_cart"></p>
</div>
@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
