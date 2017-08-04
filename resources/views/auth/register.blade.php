@extends('auth.template')

@section('page-title')
  Pendaftaran Indoresponder Gratis
@endsection

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html">Indo<b>responder</b></a>
  </div>

  <div class="register-box-body">
    <p class="lead login-box-msg">Pendaftaran akun baru</p>

    <form  method="POST" action="{{ route('register') }}">
      <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
        <input id="name" type="text" class="form-control" placeholder="Nama lengkap" name="name" value="{{ old('name') }}" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif       
      </div>
      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" name="email" value="{{ old('email') }}" type="text" class="form-control" placeholder="Alamat email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif        
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" name="password"  type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif        
      </div>
      <div class="form-group has-feedback">
        <input id="password-confirm" name="password_confirmation"  type="password" class="form-control" placeholder="Ulangi password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Setuju dengan <a href="/page/tos">ketentuan</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-primary btn-block btn-flat" disabled id="btn-reg">Daftar</button>
        </div>
      </div>
    </form>
      <div class="social-auth-links text-center">
      <p>- ATAU -</p>
      <a href="/login/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Daftar lewat
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Daftar lewat
        Google+</a>
    </div>
    <a href="/login" class="text-center"><i class="fa fa-play-circle"></i> Saya sudah pernah mendaftar</a>
  </div>
</div>
@endsection
@section('f_scripts')
<script>
  $(function () {
    $('input').on('ifChecked', function(event){
      $('#btn-reg').prop('disabled',false);
    }).on('ifUnchecked', function(event){
      $('#btn-reg').prop('disabled',true);
    }).iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
@endsection
