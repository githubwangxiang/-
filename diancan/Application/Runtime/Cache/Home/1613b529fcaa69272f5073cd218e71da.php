<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>DeathGhost-产品分类页面</title>
    <meta name="keywords" content="DeathGhost,DeathGhost.cn,web前端设,移动WebApp开发" />
    <meta name="description" content="DeathGhost.cn::H5 WEB前端设计开发!" />
    <meta name="author" content="DeathGhost"/>
    <link href="/Public/Home/style/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/public.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jqpublic.js"></script>
    <!--
    Author: DeathGhost
    Author URI: http://www.deathghost.cn
    -->
</head>
<body>
<!-- 头部导航 -->
<headers>
    <section class="Topmenubg">
        <div class="Topnav">
            <div class="LeftNav">
                <?php if( $_SESSION['user_info']== '' ): ?><a href="/index.php/Home/User/register">注册</a>/<a href="/index.php/Home/User/login">登录</a>
                <?php else: ?>
                 <a href="javascript:void(0);"><?php echo ((isset($_SESSION['user_info']['user_name']) && ($_SESSION['user_info']['user_name'] !== ""))?($_SESSION['user_info']['user_name']):$Think.session.user_info.email); ?></a>/<a href="/index.php/Home/Info/logOut">退出</a><?php endif; ?>
                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=515133122&site=qq&menu=yes"><img border="0" alt="qq客服" title="点击这里给我发消息"/></a>
                <a href="#">微信客服</a>
            </div>
            <div class="RightNav">
                <a href="/index.php/Home/Info/index">用户中心</a> <a href="user_orderlist.html" target="_blank" title="我的订单">我的订单</a> <a href="/index.php/Home/Cart/index">购物车</a>
            </div>
        </div>
    </section>
    <div class="Logo_search">
        <div class="Logo">
            <img src="/Public/Home/images/logo.jpg" title="DeathGhost" alt="模板">
            <i></i>
            <span>西安市 [ <a href="#">莲湖区</a> ]</span>
        </div>
        <div class="Search">
            <form method="post" id="main_a_serach" action="/index.php/Home/Info/search">
                <input type="hidden" name="cat" id="dd">
                <div class="Search_nav" id="selectsearch">
                    <a href="javascript:void(0);" onClick="selectsearch(this,'restaurant_name')" class="choose" s="1">餐厅</a>
                    <a href="javascript:void(0);" onClick="selectsearch(this,'food_name')" s="0">食物名</a>
                </div>
                <div class="Search_area">
                    <input type="text" id="fkeyword" name="keyword" placeholder="请输入您所需查找的餐厅名称或食物名称..." class="searchbox" />
                    <input type="button" class="searchbutton" value="搜 索" />
                </div>
            </form>
             
        </div>
    </div>
    <nav class="menu_bg">
        <ul class="menu">


            <li><a href="/index.php/Home/Index/index">首页</a></li>
            <li><a href="/index.php/Home/Res/index">订餐</a></li>
            <li><a href="/index.php/Home/Goods/index">积分商城</a></li>
            <li><a href="article_read.html">关于我们</a></li>
        </ul>
    </nav>
</headers>
<!--  头部结束  -->

<script type="text/javascript" src="/Public/Home/js/cart.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.easyui.min.js"></script>

<link rel="stylesheet" type="text/css" href="/Public/Home/style/page.css">
<script>
$(function(){		
	$('.title-list li').click(function(){
		var liindex = $('.title-list li').index(this);
		$(this).addClass('on').siblings().removeClass('on');
		$('.menutab-wrap div.menutab').eq(liindex).fadeIn(150).siblings('div.menutab').hide();
		var liWidth = $('.title-list li').width();
		$('.shopcontent .title-list p').stop(false,true).animate({'left' : liindex * liWidth + 'px'},300);
	});
	
	$('.menutab-wrap .menutab li').hover(function(){
		$(this).css("border-color","#ff6600");
		$(this).find('p > a').css('color','#ff6600');
	},function(){
		$(this).css("border-color","#fafafa");
		$(this).find('p > a').css('color','#666666');
	});
	});
	var mt = 0;
window.onload = function () {
 var Topcart = document.getElementById("Topcart");
   var mt = Topcart.offsetTop;
    window.onscroll = function () {
     var t = document.documentElement.scrollTop || document.body.scrollTop;
      if (t > mt) {
      Topcart.style.position = "fixed";
        Topcart.style.margin = "";
         Topcart.style.top = "200px";
		 Topcart.style.right = "191px";
		 Topcart.style.boxShadow ="0px 0px 20px 5px #cccccc";
		 Topcart.style.top="0";
		 Topcart.style.border="1px #636363 solid";
         }
         else { 
         Topcart.style.position = "static";
		 Topcart.style.boxShadow ="none";
		 Topcart.style.border="";
          }
          }
        }
</script>
<!--
Author: DeathGhost
Author URI: http://www.deathghost.cn
-->

<!--Start content-->
<section class="Shop-index">
 <article>
  <div class="shopinfor">
   <div class="title">
    <img src="/Public/Home/upload/wpjnewlogo.jpg" class="shop-ico">
    <span><?php echo ($rest["res_name"]); ?></span>
   </div>
   <div class="imginfor">
    <div class="shopimg">
     <img src="<?php echo ($rest["res_logo"]); ?>" id="showimg">
      <ul class="smallpic">
       <li><img src="<?php echo ($rest["res_logo"]); ?>" onmouseover="show(this)" onmouseout="hide()"></li>
      </ul>
    </div>
    <div class="shoptext">
     <p><span>地址：</span><?php echo ($rest["res_pro"]); echo ($rest["res_city"]); echo ($rest["res_area"]); echo ($rest["res_address"]); ?></p>
     <p><span>电话：</span>029-88888888</p>
     <p><span>特色菜品：</span>毛肚、牛丸、滑虾、羊肉、香辣虾...</p>
     <p><span>优惠活动：</span>暂无信息</p>
     <p><span>停车位：</span>4个停车位（免费）</p>
     <p><span>营业时间：</span>09:00~22:00</p>
     <p><span>WIFI：</span>免费WIFI</p>
     <p><span>价格：</span><?php echo ($rest["res_price"]); ?>元</p>
     <div class="Button">
      <a href="#ydwm"><span class="DCbutton">查看菜谱点菜</span></a>
     </div>
     <div class="otherinfor">
     <a href="#" class="icoa"><img src="/Public/Home/images/collect.png">收藏店铺（1293）</a>
     <div class="bshare-custom"><a title="分享" class="bshare-more bshare-more-icon more-style-addthis">分享</a></div>
	 <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
     </div>
   </div>
  </div>
  <div class="shopcontent">
  <div class="title2 cf">
    <ul class="title-list fr cf ">
      <li class="on">菜谱</li>
      <li>累计评论（5）</li>
      <li>商家详情</li>
      <li>店铺留言</li>
      <p><b></b></p>
    </ul>
  </div>
  <div class="menutab-wrap">
   <a name="ydwm">
    <!--菜谱-->
    <div class="menutab show">
     <ul class="products">
      <?php if(is_array($food)): $i = 0; $__LIST__ = $food;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li>
		 <a href="Home/Food/detail/id/<?php echo ($vol["id"]); ?>" target="_blank" title="酸辣土豆丝">
         <img src="<?php echo ($vol["is_logo_small"]); ?>" class="foodsimgsize">
         </a>
          <a href="#" class="item">
		 <div>
		  <p><?php echo ($vol["food_name"]); ?><span style="display: none;"><?php echo ($vol["id"]); ?></span></p>
		  <p class="AButton">拖至购物车:￥<?php echo ($vol["food_nowprice"]); ?></p>
		 </div>
		 </a>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>

    
      <!--  <div class="TurnPage">
     <a href="#">
      <span class="Prev"><i></i>首页</span>
     </a>
     <a href="#"><span class="PNumber">1</span></a>
     <a href="#"><span class="PNumber">2</span></a>
     <a href="#">
     <span class="Next">最后一页<i></i></span>
     </a>
    </div> -->
	 </ul>
    </div>
    </a>
    <div class="badoo">
        <?php echo ($page_html); ?>
      </div>
    <!--评论-->
    <div class="menutab">
     <div class="shopcomment">
      <div class="Spname">
       <a href="#" target="_blank" title="酸辣土豆丝">酸辣土豆丝</a>
      </div>
      <div class="C-content">
       <q>还不错，速度挺快,还不错，速度挺快还不错，速度挺快还不错，速度挺快还不错，速度挺快还不错，速度挺快还不错，速度挺快。。。</q>
       <i>2014年09月17日 19:36 </i>
      </div>
      <div class="username">
      DeatGhost
      </div>
     </div>
    </div>
    <!--地图-->
    <div class="menutab">
     <div class="shopdetails">
     <div class="shopmaparea">
      <img src="/Public/Home/upload/testimg.jpg"><!--此处占位图调用动态地图后将其删除即可-->
     </div>
     <div class="shopdetailsT">
      <p><span>店铺：<?php echo ($rest["res_name"]); ?></span></p>
      <p><span>地址：</span><?php echo ($rest["res_pro"]); echo ($rest["res_city"]); echo ($rest["res_area"]); echo ($rest["res_address"]); ?></p>
      <p><span>电话：</span>029-88888888</p>
      <p><span>乘车路线：</span>300路、115路、14路、800路到西辛庄站下车往东100米</p>
      <p><span>店铺介绍：</span>***于2005年3月28日开业，立于西安市碑林区***于2005年3月28日开业，立于西安市碑林区***于2005年3月28日开业，立于西安市碑林区***于2005年3月28日开业，立于西安市碑林区***</p>
     </div>
    </div>
    </div>
    <!--case5-->
    <div class="menutab">
     <span class="Ask"><i>DeathGhost</i>:这里是测试问答？</span>
     <span class="Answer"><i>管理员回复</i>：这里是测试回答！</span>


      <div class="badoo">
        <?php echo ($page_html); ?>
      </div>
<!--      <div class="TurnPage">
     <a href="#">
      <span class="Prev"><i></i>首页</span>
     </a>
     <a href="#"><span class="PNumber">1</span></a>
     <a href="#"><span class="PNumber">2</span></a>
     <a href="#">
     <span class="Next">最后一页<i></i></span>
     </a>
    </div> -->
    <!--店铺留言-->
     <form class="A-Message" action="#"> 
      <p><i>姓名：</i><input name="usr_name" type="text" autofocus placeholder="张三" required></p>
      <p><i>手机：</i><input name="" type="text" placeholder="15825518***" pattern="[0-9]{11}" required></p>
      <p><i>邮件：</i><input type="email" name="email" autocomplete="off" placeholder="admin@admin.com" required/></p>
      <p><i>问题补充：</i><textarea name="" cols="" rows="" required placeholder="详细说明您的问题..."></textarea></p>
      <p><input type="submit" class="Abutt" /></p>
     </form>
    </div>
  </div>
</div>
 </article>
 <!--侧边栏-->
 <aside>
  <div class="cart" id="Topcart">
	<span class="Ctitle Block FontW Font14"><a href="/index.php/Home/Cart/index" target="_blank">我的购物车</a></span>
	<table id="cartcontent" fitColumns="true">
	<thead>
	<tr>
	<th width="33%" align="center" field="name">商品</th>
	<th width="33%" align="center" field="quantity">数量</th>
	<th width="33%" align="center" field="price">价格</th>
	</tr>
	</thead>
	</table>
  <p class="Ptc"><span class="Cbutton">
     <!--<a href="/index.php/Home/Cart/index" target="进入购物车">进入购物车</a>-->
     <a  name="cart">进入购物车</a>
    </span><span class="total">共计金额: ￥0</span></p>
  </div>
  
  <div class="Nearshop">
   <span class="Nstitle">附近其他店铺</span>
   <ul>
    <li>
     <img src="/Public/Home/upload/cc.jpg">
     <p>
     <span class="shopname" title="动态调用完整标题"><a href="detailsp.html" target="_blank" title="肯德基">肯德基</a></span>
     <span class="Discolor">距离：1.2KM</span>
     <span title="完整地址title">地址：西安市雁塔区2000号...</span>
     </p>
    </li>
   </ul>
  </div>
  
  <div class="History">
   <span class="Htitle">浏览历史</span>
   <ul>
    <li>
    <a href="detailsp.html" target="_blank" title="清真川菜馆"><img src="/Public/Home/upload/cc.jpg"></a>
    <p>
     <span class="shopname" title="动态调用完整标题"><a href="detailsp.html" target="_blank" title="正宗陕北小吃城">正宗陕北小吃城</a></span>
     <span>西安市莲湖区土门十西安市莲湖区土门十字西安市莲湖区土门十字.</span>
    </p>
    </li>
    <span>[ <a href="#">清空历史记录</a> ]</span>
   </ul>
  </div>
 </aside>
 
</section>
<script>


 //给添加购物车增加点击事件
 $('a[name=cart]').click(function(){


//将数据进行遍历,获取每一行的数据
    console.log($('table[class=datagrid-btable]'));
    var trs=$('table[class=datagrid-btable]').find('tr');
    console.log(trs);
    var cart_data=[];

//    addcart方法的三个参数，$food_id, $is_food, $num
    $.each(trs,function(k,v){
        var tr_data=[];
        tr_data.push($(v).find('span').html());//food_id 下标0
        tr_data.push($(v).find('td[field=quantity]').find('div').html());//数量  1
        tr_data.push(1);//is_food  2
        console.log(tr_data);
        cart_data.push(tr_data);
     })
     console.log(cart_data);
//将数据进行传输
   $.ajax({
     'url':'/index.php/Home/Res/restocart',
     'data':{data:cart_data},
     'type':'post',
     'dataType':'json',
      'success':function(response){

//填写ajax 请求返回的结果，如果全部正确，在AJAX中进行页面跳转。locahost.href='地址';
        if(response.code==1000)
        {
         

             location.href='/index.php/Home/Cart/index';
        }else if(response.code==1001){
                alert('请先登录');
                 location.href='/index.php/Home/User/login';
        }else
        {
          alert('购物车正在维修。。');
        }
      }
   })
 })
</script>

<!-- 底部导航 -->

<div class="F-link">
    <span>友情链接：</span>
    <a href="http://www.deathghost.cn" target="_blank" title="DeathGhost">DeathGhost</a>
    <a href="http://www.17sucai.com/pins/15966.html" target="_blank" title="免费后台管理模板">绿色清爽版通用型后台管理模板免费下载</a>
    <a href="http://www.17sucai.com/pins/17567.html" target="_blank" title="果蔬菜类模板源码">HTML5果蔬菜类模板源码</a>
    <a href="http://www.17sucai.com/pins/14931.html" target="_blank" title="黑色的cms商城网站后台管理模板">黑色的cms商城网站后台管理模板</a>
</div>
<footer>
    <section class="Otherlink">
        <aside>
            <div class="ewm-left">
                <p>手机扫描二维码：</p>
                <img src="/Public/Home/images/Android_ico_d.gif">
                <img src="/Public/Home/images/iphone_ico_d.gif">
            </div>
            <div class="tips">
                <p>客服热线</p>
                <p><i>1830927**73</i></p>
                <p>配送时间</p>
                <p><time>09：00</time>~<time>22:00</time></p>
                <p>网站公告</p>
            </div>
        </aside>
        <section>
            <div>
                <span><i class="i1"></i>配送支付</span>
                <ul>
                    <li><a href="article_read.html" target="_blank" title="标题">支付方式</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">配送方式</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">配送效率</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">服务费用</a></li>
                </ul>
            </div>
            <div>
                <span><i class="i2"></i>关于我们</span>
                <ul>
                    <li><a href="article_read.html" target="_blank" title="标题">招贤纳士</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">网站介绍</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">配送效率</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">商家加盟</a></li>
                </ul>
            </div>
            <div>
                <span><i class="i3"></i>帮助中心</span>
                <ul>
                    <li><a href="article_read.html" target="_blank" title="标题">服务内容</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">服务介绍</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">常见问题</a></li>
                    <li><a href="article_read.html" target="_blank" title="标题">网站地图</a></li>
                </ul>
            </div>
        </section>
    </section>
    <div class="copyright">© 版权所有 2017 代码敲敲提供 技术支持：<a href="http://www.deathghost.cn" title="DeathGhost">Just Do</a></div>
</footer>
</body>
</html>
<script>
    $(function(){
        $('.searchbutton').click(function(){

           //判断是否有值
            var ky=$('#fkeyword').val();
            if(ky=='')
               return;
            //s=1为餐馆
            var s=$('.choose').attr('s');
            $('#dd').val(s);
            $('#main_a_serach').submit();
        });
    });
</script>