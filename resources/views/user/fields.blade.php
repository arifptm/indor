<div class="form-group col-sm-12">
    {!! Form::label('name', 'User Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
</div>

<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
</div>

<div class="form-group col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif  
</div>

<div class="form-group col-sm-12">
    {!! Form::label('confirm_password', 'Confirm Password:') !!}
    {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
        @if ($errors->has('confirm_password'))
            <span class="help-block">
                <strong>{{ $errors->first('confirm_password') }}</strong>
            </span>
        @endif    
</div>

<div class="form-group col-sm-3">
    {!! Form::label('package_id', 'Package:') !!}<br>
    {!! Form::select('package_id', $packages, null, ['class' => 'form-control']) !!}
        @if ($errors->has('package_id'))
            <span class="help-block">
                <strong>{{ $errors->first('package_id') }}</strong>
            </span>
        @endif    
</div>

<div class="form-group col-sm-3">
	{!! Form::label('role', 'Roles:') !!}<br>
	<div class="icheck">
		@foreach ($roles as $role)
			<input type="checkbox" name="role[]" value="{{$role->name}}" @if(!empty($user_roles)){{ in_array($role->name, $user_roles) ? 'checked' : '' }}@endif > <span style="margin-right:50px;">{{ $role->name }}</span>	
		@endforeach
	</div>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('status', 'Status:') !!}<br>
    <div class="icheck">
        <input type="checkbox" name="status" {{ ($user->verified == 1) ? 'checked' : '' }} > <span style="margin-right:50px;">Active</span>    
    </div>
</div>


<div class="form-group col-sm-12">
    {!! Form::button('Simpan', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}    
</div>