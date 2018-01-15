<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{ url('/user') }}" method='post'>
		{{ csrf_field() }}
		name:<input type="text" name='name'><br>
		password:<input type="password" name='password'><br>
		<button>提交</button>
	</form>
</body>
</html>