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
<!--Start content-->
<section class="slp">
 <section class="food-hd">
  <div class="foodpic">
   <img src="<?php echo ($food["is_logo"]); ?>" id="showimg">
    <ul class="smallpic">
     <li><img src="<?php echo ($food["is_logo_small"]); ?>" onmouseover="show(this)" onmouseout="hide()"></li>
    </ul>
  </div>
  <div class="foodtext">
   <div class="foodname_a">
    <h1><?php echo ($food["food_name"]); ?></h1>
   </div>
      <br />
   <div class="price_a">
    <p class="price01">促销：￥<span><?php echo ($food["food_nowprice"]); ?></span></p>
    <p class="price02">价格：￥<s><?php echo ($food["food_price"]); ?></s></p>
   </div>
   <ul class="Tran_infor">
     <li>
      <p class="Numerical">3</p>
      <p>月销量</p>
     </li>
     <li class="line">
      <p class="Numerical"><?php echo ($food["food_sale"]); ?></p>
      <p>累计评价</p>
     </li>
   </ul>
   <form action="/index.php/Home/Food/addcart" method="post">
       <input type="hidden" name="food_id" value="<?php echo ($food["id"]); ?>">
       <input type="hidden" name="is_food" value="<?php echo ($food["is_food"]); ?>">
   <div class="BuyNo">
    <span>我要买：<input type="number" name="num" required autofocus min="1" value="1"/>份</span>
    <div class="Buybutton">
     <input id="LikBasket" type="submit" value="加入购物车" class="BuyB">
     <a href="/"><span class="Backhome">进入店铺首页</span></a>
    </div>
   </div>
   </form>
  </div>
     <div class="viewhistory">
         <span class="VHtitle">热门积分兑换gogo>></span>
         <ul class="Fsulist">
             <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li>
                     <a href="/index.php/Home/Goods/detail/id/<?php echo ($vol["id"]); ?>" target="_blank" title="<?php echo ($vol["goods_name"]); ?>"><img src="<?php echo ($vol["goods_logo"]); ?>"></a>
                     <p><a href="/index.php/Home/Goods/detail/id/<?php echo ($vol["id"]); ?>"><?php echo ($vol["goods_name"]); ?>&nbsp;------&nbsp;<?php echo ($vol["goods_grade"]); ?>积分</a></p>
                 </li><?php endforeach; endif; else: echo "" ;endif; ?>
         </ul>
     </div>
 </section>
 <!--bottom content-->
 <section class="Bcontent">
  <article>
   <div class="shopcontent">
  <div class="title2 cf">
    <ul class="title-list fr cf ">
      <li class="on">详细说明</li>
      <li>评价详情（5）</li>
      <li>成交记录（<?php echo ($food["food_sale"]); ?>）</li>
      <p><b></b></p>
    </ul>
  </div>
  <div class="menutab-wrap">
    <!--case1-->
    <div class="menutab show">
      <div class="cont_padding">
       <img src="<?php echo ($food["is_logo_small"]); ?>">
       <?php echo ($food["food_introduce"]); ?>
      </div>
    </div>
  </div>
    <!--case2-->
    <div class="menutab">
     <div class="cont_padding">
      <table class="Dcomment">
       <th width="80%">评价内容</th>
       <th width="20%" style="text-align:right">评价人</th>
       <tr>
       <td>
        还不错，速度倒是挺速度倒是挺快速度倒是挺快速度倒是挺快速度倒是挺快速度倒是挺快速度倒是挺快速度倒是挺快速度倒是挺快速度倒是挺快速度倒是挺快速度倒是挺快快...
        <time>2016-05-31 22:30:39</time>
       </td>
       <td align="right">DEATHGHOST</td>
       </tr>
      </table>
      <div class="TurnPage">
         <a href="#">
          <span class="Prev"><i></i>首页</span>
         </a>
         <a href="#"><span class="PNumber">1</span></a>
         <a href="#"><span class="PNumber">2</span></a>
         <a href="#">
         <span class="Next">最后一页<i></i></span>
        </a>
       </div>
     </div>
    </div>
    <!--case4-->
    <div class="menutab">
     <div class="cont_padding">
     
      <table width="888">
       <th width="35%">买家</th>
       <th width="15%">数量</th>
       <th width="30%">成交时间</th>
       <tr height="40">
        <td>d***t</td>
        <td>1</td>
        <td>2014-9-18 11:13:07</td>
       </tr>
      </table>
     
     </div>
       <div class="TurnPage">
         <a href="#">
          <span class="Prev"><i></i>首页</span>
         </a>
         <a href="#"><span class="PNumber">1</span></a>
         <a href="#"><span class="PNumber">2</span></a>
         <a href="#">
         <span class="Next">最后一页<i></i></span>
        </a>
       </div>
   </div>
  </article>
  <!--ad&other infor-->
  <aside>
   <!--广告位或推荐位-->
   <a href="#" title="广告位占位图片" target="_blank"><img src="upload/2014912.jpg"></a>
  </aside>
 </section>
</section>


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

        //给"加入购物车"绑定onclick时间
        $('#LikBasket').click(function(){
            //表单提交
            $('form').submit();
        })
    });

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