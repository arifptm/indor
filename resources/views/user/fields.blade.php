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
	{!! Form::label('role', 'Roles:') !!}<br>
	<div class="icheck">
		@foreach ($roles as $role)
			<input type="checkbox" name="role[]" value="{{$role->name}}" @if(!empty($user_roles)){{ in_array($role->name, $user_roles) ? 'checked' : '' }}@endif > <span style="margin-right:50px;">{{ $role->name }}</span>	
		@endforeach
	</div>
</div>


<div class="form-group col-sm-12">
    {!! Form::button('Simpan', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}    
</div>