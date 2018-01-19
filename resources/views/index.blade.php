<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border='1px'>
		<tr>
			<th>id</th>
			<th>名称</th>
			<th>操作</th>
		</tr>
		
		@foreach($data as $v)
		
		<tr>
			<td>{{ $v->id }}</td>
			<td>{{ $v->name }}</td>
			<td><a href="{{ url('/user/').'/'.$v->id.'/edit' }}">编辑</a> | <a  href="{{ url('/user/').'/'.$v->id.'/delete' }}">删除</a></td>
		</tr>
		@endforeach
	</table>

</body>
</html>