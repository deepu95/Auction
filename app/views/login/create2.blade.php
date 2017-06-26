
{{  Form::open(array('url'=>'login'))  }}

<div>
{{ Form::label('email','Email') }}
{{Form::text('email')}}
{{$errors->first('email')}}
</div>
<div>

{{ Form::label('password','Password') }}
{{ Form::password('password') }}
{{$errors->first('password')}}
</div>

{{  Form::submit() }}

{{ Form::close() }}
