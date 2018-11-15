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
<script>
var map=new BMap.Map("map");    //创建百度地图对象
map.setCurrentCity("福建")        //设置地图城市
map.enableScrollWheelZoom();    //开启 鼠标滚轮改变地图显示级别 功能
map.enableDragging();       //开启鼠标拖拽功能
    //以下四句是地图的添加控件方法 和 控件实例
map.addControl(new BMap.ScaleControl({anchor:BMAP_ANCHOR_TOP_LEFT}));   //添加一个比例尺控件
map.addControl(new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT}));  //添加一个平移缩放控件
map.addControl(new BMap.MapTypeControl({anchor:BMAP_ANCHOR_TOP_RIGHT}));    //添加一个切换地图类型的控件
map.addControl(new BMap.OverviewMapControl({isOpen:true})); //添加一个地图缩略图控件
//移除控件的方法是：removeControl(control)

var geocoder=new BMap.Geocoder();   //Geocoder服务类，它的getPoint()方法可获取指定地理位置的经纬度坐标
geocoder.getPoint("福建省三明市建宁县城关中学",function(point){
    //point是一个基础类Point(lng,lat)，以经、纬度来表示一个地理点坐标。
    //这里地址解析成功的话point形参指经纬地理坐标，否则为Null
    map.centerAndZoom(point,16);    //设置百度地图的中心点坐标 和 显示级别
    var marker=new BMap.Marker(point);  //创建地图上一个图像标注（覆盖物、在中心点point位置）
    map.addOverlay(marker);     //覆盖物方法，将覆盖物添加到地图中
    // marker.setAnimation(BMAP_ANIMATION_BOU NCE); //为图像标注添加动画效果
    var info=new BMap.InfoWindow("地址：建宁县",{
        width:250,
        height:60,
        title:"公租房"
    }); //创建弹出信息的窗口（覆盖物类）
    marker.addEventListener("click",function(){ //点击图像标注时弹出信息窗口
        map.openInfoWindow(info,point); //在指定点（此处为point中心点）弹出信息窗口
    });
},"福建");
</script>
