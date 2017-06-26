<html>
<head>

</head>
<body>
	<h1>All users</h1>
	@foreach($user as $x)
	 <p>{{$x->name}}</p>
	@endforeach
</body>
</html>