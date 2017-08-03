@extends('auth.template')
@section('content')
<div class="login-box">
  <div class="login-logo">
    Konfirmasi <b>Sukses</b>
  </div>
  <div class="login-box-body">
  	<h4>Your Email is successfully verified. Click here to <a href="{{url('/login')}}">login</a></h4>
  </div>  
</div>
@endsection