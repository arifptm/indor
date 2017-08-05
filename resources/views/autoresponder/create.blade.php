@extends('layouts.master')

@section('content-title')
    <h1>Tambah Autoresponder</h1>
@endsection 

@section('content')      
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['url' => '/autoresponders']) !!}

                        @include('autoresponder.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection
