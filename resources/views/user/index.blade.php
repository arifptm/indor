@extends('layouts.master')

@section('content-title')
	<h1 class="pull-left">
      Users<small>Optional description</small>
  </h1>
  <div class="text-right">
    <a href="/manage/users/create" class=" btn-primary btn"><i class="fa fa-plus-circle"></i> Tambah User</a>
  </div>

<!--     <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>   	 -->
@endsection


@section('content')   

      @include('flash::message')
 
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <div class="box-header with-border">
              <h3 class="box-title">User Table</h3>
            </div>
            
            <div class="box-body table-responsive">
              <table class="table table-bordered ">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th style="width: 100px">Label</th>
                </tr>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user-> name }}</td>
            <td>{{ $user-> email }}</td>
						<td>
							@foreach($user->roles as $k=>$role)
								{{ $role->name }}{{ count($user->roles) > $k+1 ? ', ' : ''}}
							@endforeach
						</td>
						<td>
			                {!! Form::open(['url' => '/manage/users/'.$user->id, 'method' => 'delete']) !!}
			                <div class='btn-group'>
			                    <a href="/manage/users/{{$user->id}}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
			                    <a href="/manage/users/{{$user->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
			                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
			                </div>
			                {!! Form::close() !!}
						</td>
					</tr>
				@endforeach                


              </table>
            </div>
            
            <div class="box-footer clearfix">
            {{ $users->links() }}
            </div>
          </div>
        </div>
      </div>
    

@endsection
