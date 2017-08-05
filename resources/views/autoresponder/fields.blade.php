<div class="col-md-6">
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'Nama Autoresponder:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('from_email', 'Email Pengirim Autoresponder:') !!}
        {!! Form::text('from_email',null, ['class' => 'form-control']) !!}
            @if ($errors->has('from_email'))
                <span class="help-block">
                    <strong>{{ $errors->first('from_email') }}</strong>
                </span>
            @endif  
    </div>


    <div class="form-group col-sm-12">
        {!! Form::label('from_name', 'Nama Pengirim Autoresponder:') !!}
        {!! Form::text('from_name',null, ['class' => 'form-control']) !!}
            @if ($errors->has('from_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('from_name') }}</strong>
                </span>
            @endif  
    </div>
 </div>

<div class="form-group col-sm-12">
    {!! Form::button('Simpan', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}    
</div>