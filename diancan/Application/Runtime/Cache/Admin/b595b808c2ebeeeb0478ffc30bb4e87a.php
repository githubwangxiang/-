<?php if (!defined('THINK_PATH')) exit();?>﻿<!--引入js等代码文件-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/Admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/Public/Admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>H-ui.admin v3.1</title>
</head>
<!--引入完毕-->
<body>
<!--引入头文件和菜单文件，引入底部文件js文件-->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">H-ui.admin</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a> <span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.1</span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
<!--			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
							<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
							<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
							<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
						</ul>
					</li>
				</ul>
			</nav>-->
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li>超级管理员</li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
						
							<li><a href="/index.php/Admin/Login/logout">切换账户</a></li>
							<li><a href="/index.php/Admin/Login/logout">退出</a></li>
						</ul>
					</li>
					<!--<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger"></span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>-->
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>

<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<!--*************************管理员管理**********************-->
<!--		<dl id="manager">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/index.php/Admin/Manager/index" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
					<li><a data-href="/index.php/Admin/Role/index" data-title="角色管理" href="javascript:void(0)">角色管理</a></li>
					<li><a data-href="/index.php/Admin/Auth/index" data-title="权限管理" href="javascript:void(0)">权限管理</a></li>
				</ul>
			</dd>
		</dl>
		&lt;!&ndash;*************************注册商管理**********************&ndash;&gt;
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 注册商管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/index.php/Admin/Seller/showSeller" data-title="入驻商家列表" href="javascript:void(0);">注册商列表</a></li>
				</ul>
			</dd>
		</dl>
		&lt;!&ndash;*************************餐饮管理**********************&ndash;&gt;
		<dl id="restaurant">
			<dt><i class="Hui-iconfont">&#xe616;</i> 餐馆管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/index.php/Admin/Restaurant/index" data-title="餐馆列表" href="javascript:void(0)">餐馆列表</a></li>
					<li><a data-href="/index.php/Admin/Cate/index" data-title="餐馆分类" href="javascript:void(0)">餐馆分类</a></li>
				</ul>
			</dd>
		</dl>
		&lt;!&ndash;*************************食品管理**********************&ndash;&gt;
		<dl id="food">
			<dt><i class="Hui-iconfont">&#xe620;</i> 食品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/index.php/Admin/Food/index" data-title="菜谱列表" href="javascript:void(0)">菜谱列表</a></li>
					<li><a data-href="product-brand.html" data-title="菜谱回收站" href="javascript:void(0)">菜谱回收站</a></li>

				</ul>
			</dd>
		</dl>
		&lt;!&ndash;*************************食品管理**********************&ndash;&gt;
		<dl id="goods">
			<dt><i class="Hui-iconfont">&#xe620;</i> 积分商场管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/index.php/Admin/Goods/userIndex" data-title="积分列表" href="javascript:void(0)">积分列表</a></li>
					<li><a data-href="/index.php/Admin/Goods/index" data-title="积分商品管理" href="javascript:void(0)">积分商品管理</a></li>

				</ul>
			</dd>
		</dl>
		&lt;!&ndash;*************************订单管理**********************&ndash;&gt;
		<dl id="order">
			<dt><i class="Hui-iconfont">&#xe620;</i> 订单管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/index.php/Admin/Order/index" data-title="订单列表" href="javascript:void(0)">订单列表</a></li>
				</ul>
			</dd>
		</dl>-->
		<!--&lt;!&ndash;*************************评论管理**********************&ndash;&gt;-->

		<?php if(is_array($_SESSION['top'])): $i = 0; $__LIST__ = $_SESSION['top'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top): $mod = ($i % 2 );++$i;?><dl id="menu-comments">
				<dt><i class="Hui-iconfont">&#xe622;</i> <?php echo ($top["auth_name"]); ?><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>

						<?php if(is_array($_SESSION['second'])): $i = 0; $__LIST__ = $_SESSION['second'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$second): $mod = ($i % 2 );++$i; if( $top["id"] == $second["pid"] ): ?><li><a data-href="/index.php/Admin/<?php echo ($second["auth_c"]); ?>/<?php echo ($second["auth_a"]); ?>" data-title="<?php echo ($second["auth_name"]); ?>" href="javascript:;"><?php echo ($second["auth_name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</dd>
			</dl><?php endforeach; endif; else: echo "" ;endif; ?>






		<!--&lt;!&ndash;*************************系统统计**********************&ndash;&gt;-->
		<!--<dl id="menu-tongji">-->
			<!--<dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计（后续）<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>-->
			<!--<dd>-->
				<!--<ul>-->
					<!--<li><a data-href="charts-1.html" data-title="折线图" href="javascript:void(0)">折线图</a></li>-->
					<!--<li><a data-href="charts-2.html" data-title="时间轴折线图" href="javascript:void(0)">时间轴折线图</a></li>-->
					<!--<li><a data-href="charts-3.html" data-title="区域图" href="javascript:void(0)">区域图</a></li>-->
					<!--<li><a data-href="charts-4.html" data-title="柱状图" href="javascript:void(0)">柱状图</a></li>-->
					<!--<li><a data-href="charts-5.html" data-title="饼状图" href="javascript:void(0)">饼状图</a></li>-->
					<!--<li><a data-href="charts-6.html" data-title="3D柱状图" href="javascript:void(0)">3D柱状图</a></li>-->
					<!--<li><a data-href="charts-7.html" data-title="3D饼状图" href="javascript:void(0)">3D饼状图</a></li>-->
				<!--</ul>-->
			<!--</dd>-->
		<!--</dl>-->
		<!--&lt;!&ndash;*************************系统管理**********************&ndash;&gt;-->
		<!--<dl id="menu-system">-->
			<!--<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理（后续）<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>-->
			<!--<dd>-->
				<!--<ul>-->
					<!--<li><a data-href="system-base.html" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>-->
					<!--<li><a data-href="system-category.html" data-title="栏目管理" href="javascript:void(0)">栏目管理</a></li>-->
					<!--<li><a data-href="system-data.html" data-title="数据字典" href="javascript:void(0)">数据字典</a></li>-->
					<!--<li><a data-href="system-shielding.html" data-title="屏蔽词" href="javascript:void(0)">屏蔽词</a></li>-->
					<!--<li><a data-href="system-log.html" data-title="系统日志" href="javascript:void(0)">系统日志</a></li>-->
				<!--</ul>-->
			<!--</dd>-->
		<!--</dl>-->

	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>

<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--引入完毕-->



<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="我的桌面" data-href="welcome.html">我的桌面</span>
					<em></em></li>
		</ul>
	</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="/index.php/Admin/Index/welcome"></iframe>
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>






<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/Admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
$(function(){
	/*$("#min_title_list li").contextMenu('Huiadminmenu', {
		bindings: {
			'closethis': function(t) {
				console.log(t);
				if(t.find("i")){
					t.find("i").trigger("click");
				}		
			},
			'closeall': function(t) {
				alert('Trigger was '+t.id+'\nAction was Email');
			},
		}
	});*/
});
/*个人信息*/
function myselfinfo(){
	layer.open({
		type: 1,
		area: ['300px','200px'],
		fix: false, //不固定
		maxmin: true,
		shade:0.4,
		title: '查看信息',
		content: '<div>管理员信息</div>'
	});
}

/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}


</script> 

<!--此乃百度统计代码，请自行删除-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>