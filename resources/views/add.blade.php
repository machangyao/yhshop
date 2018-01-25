<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{ url('/user') }}" method='post'>
		{{ csrf_field() }}
		名称: <input type="text" name='name'> <br>
		密码: <input type="password" name='password'> <br>
		<button>提交</button>
	</form>
</body>
</html>