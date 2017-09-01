<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		.header{
			height: 100px;
			background-color: darkred
		}
		.middle{
			height: 300px;
			background-color: lightblue
		}
		.footer{
			height: 100px;
			background-color: yellowgreen
		}
	</style>
</head>
<body>
	@include('common.header',['page'=>'文章页面'])
	<div class="middle">1文章中间内容</div>
	@include('common.footer')

</body>
</html>