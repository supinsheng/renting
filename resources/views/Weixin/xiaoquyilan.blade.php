<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>地图</title>
		<link rel="stylesheet" type="text/css" href="/css/weixin/base.css"/>
        <style>
        body, html, #map {
            width: 100%;height: 100%;
            overflow: hidden;margin:0;
            }
        #map {
            width: 100%;
            height: 100%;
            margin:0 auto;
            }
        </style>
	</head>
	<body>
        <div id="map"></div>
	</body>
</html>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=hMhtEs7usebfuEzIoCAc9zmVW6vMjhLY"></script>
<script type="text/javascript">
    var map = new BMap.Map("map");
    var point = new BMap.Point(120.382029,30.312903);
    map.centerAndZoom(point,9);
    var marker = new BMap.Marker(point);
    var mapPoints = [
        {x:30.312903,y:120.382029,title:"A",con:"我是A",branch:"老大"},
        {x:30.215855,y:120.024568,title:"B",con:"我是B",branch:"老二"},
        {x:30.18015,y:120.174968,title:"C",con:"我是C",branch:"老三"},
        {x:30.324994,y:120.164399,title:"D",con:"我是D",branch:"老四"},
        {x:30.24884,y:120.305074,title:"E",con:"我是E",branch:"老五"}
    ];
    var i = 0;
    map.addOverlay(marker);
    map.enableScrollWheelZoom(true);
    // 函数 创建多个标注
    function markerFun (points,label,infoWindows) {
        var markers = new BMap.Marker(points);
        map.addOverlay(markers);
        markers.setLabel(label);
        markers.addEventListener("click",function (event) {
            console.log("0001");
            map.openInfoWindow(infoWindows,points);//参数：窗口、点  根据点击的点出现对应的窗口
        });
    }
    for (;i<mapPoints.length;i++) {
        var points = new BMap.Point(mapPoints[i].y,mapPoints[i].x);//创建坐标点
        var opts = {
            width:250,
            height: 100,
            title:mapPoints[i].title
        };
        var label = new BMap.Label(mapPoints[i].branch,{
            offset:new BMap.Size(25,5)
        });
        var infoWindows = new BMap.InfoWindow(mapPoints[i].con,opts);
        markerFun(points,label,infoWindows);
    }
</script>