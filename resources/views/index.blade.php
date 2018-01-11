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
			<th>name</th>
			<th>操作</th>
		</tr>
		@foreach($data as $v)
		<tr>
			<td>{{ $v->id }}</td>
			<td>{{ $v->name }}</td>
			<td><a href="{{url('/user/').'/'.$v->id.'/edit'}}">编辑 </a><a onclick="del({{$v->id}})" href="javascript:void(0)" >删除</a></td>
		</tr>
		@endforeach
	</table>
	<form id='form' style="display:none" action="" method='post'>
		<input type="hidden" name='_method' value='DELETE'>
		{{csrf_field()}}
		
	</form>
</body>
<script type="text/javascript" src='/js/jquery-1.8.3.js'></script>
<script type="text/javascript">
	function del(id){
		$('#form').attr('action',"{{ url('/user') }}/"+id);
		$('#form').submit();
	}
</script>
</html>