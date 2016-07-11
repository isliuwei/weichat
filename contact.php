<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>contact</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">联系我</div>
	          		<div class="panel-body">
		          		<h3>info</h3>
		          		<ul class="list-group">
		          		 	<li class="list-group-item">地址：新疆自治区乌鲁木齐市天山区明华街2号</li>
		          		 	<li class="list-group-item"><a href="tel:10086">电话：0991-4979594</a></li>
		          		 	<li class="list-group-item">QQ：445913035</li>
		          		 	<li class="list-group-item"><a href="mailto:lw.588@163.com">Email：zgrmjfj69006@grb.com</a></li>
		          		</ul>

	          			
	          		</div>
	          		<div class="paner-footer">
	          			<h3>location</h3>
	          			<div id="allmap" style="width:99%;height:240px;"></div>
	          		</div>
          		</div>
			</div>
		</div>
	</div>








<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>  
<script src="http://api.map.baidu.com/api?v=2.0&ak=AMt1vrxwTqGzf1I94PMx7K0u" type="text/javascript"></script>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(126.637828, 45.714955);
	map.centerAndZoom(point, 18);
	var marker = new BMap.Marker(point);  // 创建标注
	map.addOverlay(marker);               // 将标注添加到地图中
	marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
	map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
	//map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
</script>
</body>
</html>
