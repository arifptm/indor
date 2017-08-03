@extends('layouts.master')

@section('content-title')
  <h1>
    Profile
    <small>Profile description</small>
  </h1>

<!--     <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>      -->
@endsection


@section('content') 
<div class="row">
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/bower_components/AdminLTE/dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">{{ $user->roles->first()->name }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
                <li class="list-group-item">
                  <b>Password</b> <a class="pull-right">{{ $user->password }}</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
          </div>

        </div>
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title ">Edit Profile</h3>
            </div>
            <div class="box-body">
            {!! Form::model($user, ['url' => '/profile/update', 'method' => 'patch']) !!}
              <div class="form-group col-sm-12">
                  {!! Form::label('name', 'User Name:') !!}
                  {!! Form::text('name', null, ['class' => 'form-control']) !!}
              </div>

              <div class="form-group col-sm-12">
                  {!! Form::label('email', 'Email:') !!}
                  {!! Form::email('email', null, ['class' => 'form-control']) !!}
              </div>

              <div class="form-group col-sm-12">
                  {!! Form::label('password', 'Password:') !!}
                  {!! Form::password('password', ['class' => 'form-control']) !!}
              </div>

              <div class="form-group col-sm-12">
                  {!! Form::label('confirm_password', 'Confirm Password:') !!}
                  {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
              </div>

              <div class="form-group col-sm-12">
                  {!! Form::button('Simpan', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}    
              </div>

            {!! Form::close() !!}
            </div>
          
          </div>
        </div>

      </div>
@endsection