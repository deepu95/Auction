@extends('main')
@section('content')
<html>
<head>
	Register Here
</head>
<body>
<div class="content">
{{  Form::open(array('url' => 'users/create')) }}
{{ Form::label('username','Username') }}
{{Form::input('text','username')}}
{{$errors->first('username')}}
</div>

<div>

{{ Form::label('password','Password') }}
{{ Form::password('password') }}
{{$errors->first('password')}}
</div>
<div>

{{ Form::label('email','Email') }}
{{ Form::email('email') }}
{{$errors->first('email')}}
</div>
<div>
{{ Form::label('sex','Gender') }}
{{ Form::label('male','Male') }}
{{ Form::radio('sex','Male') }}
{{ Form::label('female','Female') }}
{{ Form::radio('sex','Female') }}
{{$errors->first('sex')}}
</div>

{{  Form::submit() }}

{{ Form::close() }}
@stop
</body>
</html>