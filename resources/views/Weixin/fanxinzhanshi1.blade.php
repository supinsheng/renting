<!DOCTYPE html>
<!-- saved from url=(0099)http://wechat.sipmch.com.cn/GZFWeb/Company/PreviewRoom.aspx?id=401501fc-9346-45bc-a53e-a69900ca5468 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.3, maximum-scale=2.0, user-scalable=no"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><title>
	房型预览
</title><link href="/css/weixin/Company.css" rel="stylesheet">
    <script src=" /js/weixin/jquery-1.12.0.js.下载"></script>
    <script src=" /js/weixin/Common.js.下载"></script>
    <script src=" /js/weixin/layer.js.下载"></script><link rel="stylesheet" href=" /css/weixin/layer.css" id="layuicss-skinlayercss">
    <script src=" /js/weixin/MainFrame.js.下载"></script>
</head>
<body style="background-color: #fff;">
    <form name="form1" method="post" action="http://wechat.sipmch.com.cn/GZFWeb/Company/PreviewRoom.aspx?id=401501fc-9346-45bc-a53e-a69900ca5468" id="form1">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTQ4ODIyNzI0NQ9kFgICAw9kFhACAg8WAh4LXyFJdGVtQ291bnRmZAIFDxYCHwBmZAIGDxYCHgNzcmMFIS4uLy4uL1VwbG9hZC8yMDE3MDkwNjE1MDU1NjU2LmpwZ2QCBw8PFgIeBFRleHQFCuWNleS6uumXtDFkZAIIDxYCHwACAhYEZg9kFgJmDxUDFDIwMTcwOTA2MTUwNTU2NTYuanBnCuWNleS6uumXtDEK5Y2V5Lq66Ze0MWQCAQ9kFgJmDxUDFDIwMTcwOTA2MTUwNjE3MDIuanBnCuWNleS6uumXtDIK5Y2V5Lq66Ze0MmQCCQ8WAh8BBSEuLi8uLi9VcGxvYWQvMjAxNzA5MDYxNTA2NTE4My5qcGdkAgoPDxYCHwIFFuW6iuS9jeaIluWMhemXtOaIt+WeizFkZAILDxYCHwACAhYEZg9kFgJmDxUDFDIwMTcwOTA2MTUwNjUxODMuanBnFuW6iuS9jeaIluWMhemXtOaIt+WeizEW5bqK5L2N5oiW5YyF6Ze05oi35Z6LMWQCAQ9kFgJmDxUDFDIwMTcwOTA2MTUwNzA3MjYuanBnFuW6iuS9jeaIluWMhemXtOaIt+WeizIW5bqK5L2N5oiW5YyF6Ze05oi35Z6LMmRk4H65c0oKZdjZcKxdZ+JiQA+96fxnM8MOUyXLGTpme4Q=">
</div>

<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="E4E63B35">
</div>
        <div class="list-title">
            
            <div class="menu" style="display: none;">单身合租户型图</div>
            
            <div class="menu" style="display: none;">家庭型户型图</div>
            
            <div class="menu selected">单人间</div>
            
            <div class="menu">床位或包间</div>
            
        </div>
        <img src=" /images/weixin/swap.png" class="swap" style="display: none">


        <div class="list-cont" style="display:none">
            <div class="panel" style="height: 1028px;">
                <img src=" /images/weixin/DefaultPic.png" id="singleimg" style="width: 100%;">
            </div>
            <div class="house_tit">
                <span id="lblname"></span>
            </div>
            <div class="house_type" style="display: none;">
                <ul class="house_type_ul">
                    
                </ul>
                <div class="house_type_kong"></div>
            </div>
        </div>
        <div class="list-cont" style="display:none">
            <div class="panel" style="height: 1028px;">
                <img src=" /images/weixin/DefaultPic.png" id="homeimg" style="width: 100%;">
            </div>
            <div class="house_tit">
                <span id="lblhomename"></span>
            </div>
            <div class="house_type" style="display: none;">
                <ul class="house_type_ul">
                    
                </ul>
                <div class="house_type_kong"></div>
            </div>
        </div>
        <div class="list-cont" style="display: block;">
            <div class="panel" style="height: 1028px;">
                <img src=" /images/weixin/2017090615061702.jpg" id="imgSingleRooms" style="width: 100%;">
            </div>
            <div class="house_type" style="display: none;">
                <div class="house_type_kong"></div>
            </div>
        </div>
        <div class="list-cont" style="display: none;">
            <div class="panel" style="height: 1028px;">
                <img src=" /images/weixin/2017090615065183.jpg" id="imgCompartments" style="width: 100%;">
            </div>
            <div class="house_type" style="display: block;">
                <div class="house_type_kong"></div>
            </div>
        </div>
        <script type="text/javascript">
            document.querySelector('body').addEventListener('touchstart', function (ev) {
                event.preventDefault();
            });
</script>
        <script>

            $('.house_tit').on(tap, function () {
                $(this).parent().find(".house_type").show();
            })
            $('.house_type_kong').on(tap, function () {
                $(this).parent().hide();
            })
            $('.house_li').on(tap, function () {
                if ($(this).hasClass('house_li_pre')) { }
                else {
                    $(".house_li").removeClass("house_li_pre");
                    $(this).addClass("house_li_pre");
                }
                var src = $(this).find(".ChangeImg").attr("data-attachment");
                var name = $(this).find(".ChangeImg").attr("data-imgname");
                var sign = $(this).find(".ChangeImg").attr("data-sign");
                if (src != "") {
                    if (sign == '0') {
                        $("#lblname").html(name);

                        $("#singleimg").attr("src", "../../Upload/" + src);
                    }
                    else if (sign == '1') {
                        $("#lblhomename").html(name);
                        $("#homeimg").attr("src", "../../Upload/" + src);
                    }
                    else if (sign == '2') {
                        $("#lblSingleRooms").html(name);
                        $("#imgSingleRooms").attr("src", "../../Upload/" + src);
                    }
                    else if (sign == '3') {
                        $("#lblCompartments").html(name);
                        $("#imgCompartments").attr("src", "../../Upload/" + src);
                    }
                }
            })
            top.setResize(function (width, height) {
                $(".list-cont .panel").height(height - $(".list-title").height() - 40 - $(".house_tit").height() - 80);
            }, window);
            $(function () {
                $('.menu').on(tap, function () {
                    if ($(this).hasClass('selected')) return;
                    $(this).addClass('selected').siblings().removeClass('selected');
                    $('.list-cont').hide().eq($(this).prevAll().length).show();
                })
                $('.swap').on(tap, function () {
                    if (!$(".preview_select").is(":visible")) {
                        $(".preview_select").show();
                        $('.list-cont .panel').css({ "left": "469px" });
                        $(".swap").css({ "left": "469px" });
                    } else {
                        $(".preview_select").hide();
                        $('.list-cont .panel').css({ "left": "3%" });
                        $(".swap").css({ "left": "3%" });
                    }
                })

            })


            $(function () {
                $(".house_type_ul").each(function () {
                    $(this).children().eq(0).addClass("house_li_pre");
                });
            });
        </script>
    </form>
</body></html>