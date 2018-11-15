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
    var point = new BMap.Point(116.608886,26.623865);
    map.centerAndZoom(point,11);
    var marker = new BMap.Marker(point);
    var mapPoints = [
        {x:26.623865,y:116.608886,title:"1",con:"1",branch:"河东公房廉租房"},
        {x:26.845408,y:116.848487,title:"2",con:"2",branch:"黄丹坊上坑C栋"},
        {x:26.841057,y:116.855676,title:"3",con:"3",branch:"原河东小学"},
        {x:26.845408,y:116.848487,title:"4",con:"4",branch:"黄丹坊上坑A栋"},
        {x:26.845408,y:116.848487,title:"5",con:"5",branch:"黄丹坊上坑B栋"},
        {x:26.845408,y:116.848487,title:"6",con:"6",branch:"65-67号属危房"},
        {x:26.845408,y:116.848487,title:"7",con:"7",branch:"49号属危房"},
        {x:26.833175,y:116.845501,title:"8",con:"8",branch:"高家窠A，B栋公房"},
        {x:26.835519,y:116.852443,title:"9",con:"9",branch:"危房"},
        {x:26.853525,y:116.834195,title:"0",con:"0",branch:"危房"}
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
        var points = new BMap.Point(mapPoints[i].y,mapPoints[i].x);
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