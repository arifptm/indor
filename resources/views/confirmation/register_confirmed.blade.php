@extends('auth.template')
@section('content')
<div class="login-box" style="width:500px;">
  <div class="login-logo">
    Konfirmasi <b>Sukses</b>
  </div>
  <div class="login-box-body">
  	<h4>Email anda telah berhasil di-verifikasi.<h4/>
  	<h4>Silakan <a href="{{url('/login')}}"><strong>login</strong></a>.</h4>
  </div>  
</div>
@endsection