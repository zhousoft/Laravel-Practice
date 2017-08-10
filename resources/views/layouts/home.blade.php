
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
	<div class ="header"> 公共头部 </div>	
	@yield('content')
	<div class ="footer">公共底部</div>
</body>
</html>