<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>@yield('title')</title>
		@section('style')
		@show

		@section('js')
		@show

	</head>

	<body>
	{{--header头开始--}}
	@include('layouts.home.header')
	{{--header尾结束--}}
	@section('content')
	@show
	{{--footer头开始--}}
	@include('layouts.home.footer')
	{{--footer尾开始--}}
	</body>

</html>