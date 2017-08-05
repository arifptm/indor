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
              <h3 class="box-title">Package Table</h3>
            </div>
            
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hovered table-striped">
                <tr>
                  <th style="width: 20px">#</th>
                  <th  style="width: 200px">Name &amp; Description</th>
                  <th colspan="3">Quota</th>
                  <th colspan="3">Permission</th>                
                  <th>Status</th>
                  <th>Action</th>

                </tr>
				@foreach($packages as $package)
					<tr>
						<td>{{ $package->id }}</td>
						<td><div><strong>{{ $package-> name }}</strong></div>{{ $package->description}}</td>
            
            <td >Max. Autoresponder <span class="pull-right text-bold">{{ $package->max_autoresponder}}</span><br>
              Max. Subscriber  <span class="pull-right text-bold">{{ $package->max_subscriber}}</span><br>
              Max. Message <span class="pull-right text-bold">{{ $package->max_message}}</span><br>
              Max. Custom field <span class="pull-right text-bold">{{ $package->max_custom_field}}</span> </td>
            <td >Max. Option fields <span class="pull-right text-bold">{{$package->max_option_field}}</span><br>
              Max. Custom Tag <span class="pull-right text-bold">{{$package->max_custom_tag}}</span><br>
              Max. Daily import <span class="pull-right text-bold">{{$package->max_daily_import}}</span><br>
              Max. Link Tracking <span class="pull-right text-bold">{{$package->max_link_tracking}}</span>
            </td>
            <td style="width: 20px"></td>
            <td>Single Optin <span class="pull-right text-bold">{{ $package->can_single_optin == "1" ? 'YES' : 'NO' }}</span><br>
              Show Ads <span class="pull-right text-bold">{{ $package-> show_ads == "1" ? 'YES' : 'NO' }}</span><br>
              Can Import Subscriber <span class="pull-right text-bold">{{ $package-> can_import == "1" ? 'YES' : 'NO' }}</span>
            </td>
            
            <td>
              Can copy messages <span class="pull-right text-bold">{{ $package->can_copy_message == "1" ? 'YES' : 'NO'  }}</span><br>
              Can Broadcast <span class="pull-right text-bold">{{ $package->can_broadcast  == "1" ? 'YES' : 'NO' }}</span><br>
              Can Self Reminder <span class="pull-right text-bold">{{ $package->can_reminder == "1" ? 'YES' : 'NO'  }}</span>
            </td>
             <td style="width: 20px"></td>           
						<td>
            {!! $package->status == 'A' ? '<div class="label label-primary">Aktif</div>' : ' '!!}
						</td>
						<td>
			                {!! Form::open(['url' => '/manage/packages/'.$package->id, 'method' => 'delete']) !!}
			                <div class='btn-group'>
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
