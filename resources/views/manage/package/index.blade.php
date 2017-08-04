@extends('layouts.master')

@section('content-title')
	<h1 class="pull-left">
      Package
  </h1>
  <div class="text-right">
    <a href="/manage/packages/create" class=" btn-primary btn"><i class="fa fa-plus-circle"></i> Add Package</a>
  </div>
@endsection


@section('content')   
      @include('flash::message')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <div class="box-header with-border">
              <h3 class="box-title">package Table</h3>
            </div>
            
            <div class="box-body table-responsive">
              <table class="table table-bordered ">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Aktif</th>
                  <th>Role</th>
                  <th>Social Profile</th>
                  <th style="width: 100px">Label</th>
                </tr>
				@foreach($packages as $package)
					<tr>
						<td>{{ $package->id }}</td>
						<td>{{ $package-> name }}</td>
            <td>{{ $package-> email }}</td>
            <td>{{ ($package-> verified == 1) ? 'YES' : 'no' }}</td>
						<td>
							@foreach($package->roles as $k=>$role)
								{{ $role->name }}{{ count($package->roles) > $k+1 ? ', ' : ''}}
							@endforeach
						</td>

						<td>
			                {!! Form::open(['url' => '/manage/packages/'.$package->id, 'method' => 'delete']) !!}
			                <div class='btn-group'>
			                    <a href="/manage/packages/{{$package->id}}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
			                    <a href="/manage/packages/{{$package->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
			                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
			                </div>
			                {!! Form::close() !!}
						</td>
					</tr>
				@endforeach                


              </table>
            </div>
            
            <div class="box-footer clearfix">
            {{ $packages->links() }}
            </div>
          </div>
        </div>
      </div>
    

@endsection
