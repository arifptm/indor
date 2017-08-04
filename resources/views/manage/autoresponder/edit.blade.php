@extends('layouts.master')

@section('content_title')
        <h1>Edit User</h1>
@endsection

@section('f-scripts')
<script src="{{ asset('/bower_components/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-red',
      increaseArea: '0%' // optional
    });
  });
</script>    
@endsection

@section('h-scripts')
    <link rel="stylesheet" href="{{ asset('/bower_components/iCheck/skins/square/red.css') }}">
@endsection

@section('content')
       <!-- include('adminlte-templates::common.errors') -->
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['url' => '/manage/users/'.$user->id, 'method' => 'patch']) !!}

                        @include('user.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection