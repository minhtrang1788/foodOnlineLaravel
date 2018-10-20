<h1>Hello</h1>
This is welcome test mail.
@if(Session::has('body_mail'))
{{Session::get('body_mail')}}
@endif
