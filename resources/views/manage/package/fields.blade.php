<div class="form-group col-md-3">
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description',null, ['class' => 'form-control','rows'=>5]) !!}
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif  
    </div>
</div>

<div class="form-group col-md-3">
    <div class="form-group col-sm-12">
        {!! Form::label('max_autoresponder', 'Max Autoresponder:') !!}
        {!! Form::text('max_autoresponder',null, ['class' => 'form-control']) !!}
            @if ($errors->has('max_autoresponder'))
                <span class="help-block">
                    <strong>{{ $errors->first('max_autoresponder') }}</strong>
                </span>
            @endif  
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('max_subscriber', 'Max Subcriber:') !!}
        {!! Form::text('max_subscriber',null, ['class' => 'form-control']) !!}
            @if ($errors->has('max_subscriber'))
                <span class="help-block">
                    <strong>{{ $errors->first('max_subscriber') }}</strong>
                </span>
            @endif  
    </div>  

    <div class="form-group col-sm-12">
        {!! Form::label('max_message', 'Max Message:') !!}
        {!! Form::text('max_message',null, ['class' => 'form-control']) !!}
            @if ($errors->has('max_message'))
                <span class="help-block">
                    <strong>{{ $errors->first('max_message') }}</strong>
                </span>
            @endif  
    </div> 
    <div class="form-group col-sm-12">
        {!! Form::label('max_custom_field', 'Max Custom Field:') !!}
        {!! Form::text('max_custom_field',null, ['class' => 'form-control']) !!}
            @if ($errors->has('max_custom_field'))
                <span class="help-block">
                    <strong>{{ $errors->first('max_custom_field') }}</strong>
                </span>
            @endif  
    </div>  
</div>
<div class="form-group col-md-3">         
    <div class="form-group col-sm-12">
        {!! Form::label('max_option_field', 'Max Option Field:') !!}
        {!! Form::text('max_option_field',null, ['class' => 'form-control']) !!}
            @if ($errors->has('max_option_field'))
                <span class="help-block">
                    <strong>{{ $errors->first('max_option_field') }}</strong>
                </span>
            @endif  
    </div>  
    <div class="form-group col-sm-12">
        {!! Form::label('max_custom_tag', 'Max Custom tag:') !!}
        {!! Form::text('max_custom_tag',null, ['class' => 'form-control']) !!}
            @if ($errors->has('max_custom_tag'))
                <span class="help-block">
                    <strong>{{ $errors->first('max_custom_tag') }}</strong>
                </span>
            @endif  
    </div> 
    <div class="form-group col-sm-12">
        {!! Form::label('max_import_daily', 'Max Daily Import:') !!}
        {!! Form::text('max_daily_import',null, ['class' => 'form-control']) !!}
            @if ($errors->has('max_import_daily'))
                <span class="help-block">
                    <strong>{{ $errors->first('max_import_daily') }}</strong>
                </span>
            @endif  
    </div> 
    <div class="form-group col-sm-12">
        {!! Form::label('max_link_tracking', 'Max Link Tracking:') !!}
        {!! Form::text('max_link_tracking',null, ['class' => 'form-control']) !!}
            @if ($errors->has('max_link_tracking'))
                <span class="help-block">
                    <strong>{{ $errors->first('max_link_tracking') }}</strong>
                </span>
            @endif  
    </div>     
</div>   

<div class="form-group col-md-3">
    <div class="form-group col-sm-12">    
        <div class="icheck"><label>        
            {!! Form::checkbox('can_single_optin') !!}<span style="margin-right:50px;"> Can single Optin</span></label>            
        </div>
    </div>

    <div class="form-group col-sm-12">    
        <div class="icheck"><label>        
            {!! Form::checkbox('show_ads', null) !!} <span style="margin-right:50px;"> Show Ads</span></label>
        </div>
    </div>

    <div class="form-group col-sm-12">    
        <div class="icheck"><label>        
            {!! Form::checkbox('can_import', null) !!} <span style="margin-right:50px;"> Can Import Subcribers</span></label>
        </div>
    </div>

    <div class="form-group col-sm-12">    
        <div class="icheck"><label>        
            {!! Form::checkbox('can_copy_message', null) !!} <span style="margin-right:50px;"> Can Copy Messages</span></label>
        </div>
    </div>

    <div class="form-group col-sm-12">    
        <div class="icheck"><label>        
            {!! Form::checkbox('can_broadcast', null) !!} <span style="margin-right:50px;"> Can Broadcast</span></label>
        </div>
    </div>

    <div class="form-group col-sm-12">    
        <div class="icheck"><label>        
            {!! Form::checkbox('can_reminder', null) !!} <span style="margin-right:50px;"> Can Self Reminder</span></label>
        </div>
    </div>
</div> 

<div class="form-group col-sm-12">
    {!! Form::button('Simpan', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}    
</div>