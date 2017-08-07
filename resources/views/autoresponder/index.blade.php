@extends('layouts.master')

@section('content-title')
	<h1 class="pull-left">
      Daftar Autoresponder
  </h1>
  <div class="text-right">
    <a href="/autoresponders/create" class=" btn-primary btn"><i class="fa fa-plus-circle"></i> Tambah Autoresponder</a>
  </div>
@endsection


@section('content')   
      @include('flash::message')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            

            
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hovered table-striped">
                <tr>
                  <th style="width: 20px">#</th>              
                  <th>Nama</th>
                  <th>Nama pengirim</th>
                  <th>Email pengirim</th>
                  <th>Subscriber</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
				@foreach($autoresponders as $autoresponder)
					<tr>
						<td>{{ $autoresponder->id }}</td>
						<td>{{ $autoresponder-> name }}</td>
            <td>{{ $autoresponder-> from_name }}</td>
            <td>{{ $autoresponder-> from_email }}</td>
            <td></td>
						<td>
              {!! $autoresponder->status == 'A' ? '<div class="label label-primary">Aktif</div>' : ' '!!}
              {!! $autoresponder->status == 'P' ? '<div class="label label-warning">Pending</div>' : ' '!!}
						</td>
						<td>
			                {!! Form::open(['url' => '/autoresponder/'.$autoresponder->id, 'method' => 'delete']) !!}
			                <div class='btn-group'>
			                    <a href="/autoresponders/{{$autoresponder->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
			                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Yakkin? Data yang dihapus tidak bisa dikembalikan')"]) !!}
			                </div>
			                {!! Form::close() !!}
						</td>
					</tr>
				@endforeach                


              </table>
            </div>
            
            <div class="box-footer clearfix">
            {{ $autoresponders->links() }}
            </div>
          </div>
        </div>
      </div>
    

@endsection
