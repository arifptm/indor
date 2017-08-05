@extends('layouts.master')

@section('content_title')
        <h1>Edit Package</h1>
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
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($package, ['url' => '/manage/packages/'.$package->id, 'method' => 'patch']) !!}

                        @include('manage.package.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection