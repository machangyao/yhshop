<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{ url('/user') }}/{{$user->id}}" method='post'>
		{{ csrf_field() }}
		<input type="hidden" name='_method' value='put'>
		name:<input type="text" name='name' value='{{$user->name}}'><br>
		<!-- password:<input type="password" name='password'><br> -->
		<button>提交</button>
	</form>
</body>
</html>