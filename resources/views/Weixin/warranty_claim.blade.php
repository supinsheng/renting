<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>保修申请</title>
		<link rel="stylesheet" type="text/css" href="/css/weixin/base.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/warranty_claim.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/weui.min.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/jquery-weui.min.css"/>
		<script type="text/javascript" src="/js/weixin/vue.js"></script>
		<script type="text/javascript" src="/js/weixin/axios.min.js"></script>
	</head>
	<body>
	<div class="wrap1">
		<div class="wrap">
			<div class="list clearfix">
				<div class="item" v-for="v  in item " v-bind:class="{ active:v==active }" @click="changeitem(v)">@{{ v }}</div>
				<input type="hidden" name="item"  v-model="active" >

			</div>
			<textarea placeholder="请您对设备故障进行描述..." v-model="describe"></textarea>
			<!--图片上传-->
            <div class="weui-cells weui-cells_form" id="uploader">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <div class="weui-uploader">
                            <div class="weui-uploader__hd">
                                <p class="weui-uploader__title">图片上传</p>
                                <div class="weui-uploader__info"><span id="uploadCount">0</span>/1</div>
                            </div>
                            <div class="weui-uploader__bd">
                                <ul class="weui-uploader__files" id="uploaderFiles"></ul>
                                <div class="weui-uploader__input-box">
                                    <input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" capture="camera" multiple=""  name="photo"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<!--位置-->
			<div class="addr">{{session('village')}}</div>

		</div>
		<div class="submit" @click="warrantyform()">提交报修单</div>
	</div>
	</body>
	<script src="/js/weixin/jquery-3.2.1.min.js"></script>
	{{--<script src="/js/weixin/jquery-weui.min.js"></script>--}}
    <script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.1.4/weui.min.js"></script>
    <script>
        $(document).ready(function() {
            /* 图片自动上￥传 */
            var uploadCount = 0,
                uploadList = [];
            var uploadCountDom = document.getElementById("uploadCount");
            weui.uploader('#uploader', {
                url: "{{ route('weixin_warranty_claim_getImages') }}",
                auto: true,
                type: 'file',
                fileVal: 'fileVal',
                compress: {
                    width: 1600,
                    height: 1600,
                    quality: .8
                },
                onBeforeQueued: function onBeforeQueued(files) {
                    if (["image/jpg", "image/jpeg", "image/png", "image/gif"].indexOf(this.type) < 0) {
                        weui.alert('请上传图片');
                        return false;
                    }
                    if (this.size > 10 * 1024 * 1024) {
                        weui.alert('请上传不超过10M的图片');
                        return false;
                    }
                    if (files.length > 5) {
                        // 防止一下子选中过多文件
                        weui.alert('最多只能上传1张图片，请重新选择');
                        return false;
                    }
                    if (uploadCount + 1 > 1) {
                        weui.alert('最多只能上传1张图片');
                        return false;
                    }

                    ++uploadCount;
                    uploadCountDom.innerHTML = uploadCount;
                },
                onQueued: function onQueued() {
                    uploadList.push(this);
                    //console.log(this);
                },
                onBeforeSend: function onBeforeSend(data, headers) {
                    //console.log(this, data, headers);
                     $.extend(data, { _token: '{{ csrf_token() }}' }); // 可以扩展此对象来控制上传参数
                    // $.extend(headers, { Origin: 'http://127.0.0.1' }); // 可以扩展此对象来控制上传头部

                    // return false; // 阻止文件上传
                },
                onProgress: function onProgress(procent) {
                    //console.log(this, procent);
                },
                onSuccess: function onSuccess(ret) {
                    console.log(ret.path);
                    //console.log(app.imgurl);
                    //app.imgurl=ret.path;

                },
                onError: function onError(err) {
                    //console.log(this, err);
                }
            });

            // 缩略图预览
            document.querySelector('#uploaderFiles').addEventListener('click', function (e) {
                var target = e.target;

                while (!target.classList.contains('weui-uploader__file') && target) {
                    target = target.parentNode;
                }
                if (!target) return;

                var url = target.getAttribute('style') || '';
                var id = target.getAttribute('data-id');

                if (url) {
                    url = url.match(/url\((.*?)\)/)[1].replace(/"/g, '');
                }
                var gallery = weui.gallery(url, {
                    className: 'custom-name',
                    onDelete: function onDelete() {
                        weui.confirm('确定删除该图片？', function () {
                            --uploadCount;
                            uploadCountDom.innerHTML = uploadCount;

                            for (var i = 0, len = uploadList.length; i < len; ++i) {
                                var file = uploadList[i];
                                if (file.id == id) {
                                    file.stop();
                                    break;
                                }
                            }
                            target.remove();
                            gallery.hide();
                        });
                    }
                });
            });
            });
    </script>
	<script>
        var app=new Vue({
            el: '.wrap1',
            data: {
				item:['设备名称1','设备名称2','设备名称3','设备名称4','设备名称5','设备名称6'],
				active:'设备名称1',
                describe:'',
            },
			methods:{
                changeitem:function (value) {
                    //实现tab切换
					this.active=value;
                },
                warrantyform:function () {
                    //console.log(1212);
                    axios.post('/warranty_message', {
                        active: this.active,
                        describe: this.describe
                    })
                        .then(function (response) {
                            location.href="{{route('weixin_success')}}";
                            console.log(response);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
                //获取到选中项的值
                //获取到图片
                //提交表单
			}
        })
	</script>
</html>
