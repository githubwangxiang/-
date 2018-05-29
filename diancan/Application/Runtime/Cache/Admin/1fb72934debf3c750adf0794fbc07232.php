<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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

<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" action="/index.php/Admin/Manager/detail" method="post">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($info["manager_name"]); ?>" placeholder="" id="adminName" name="adminName" readonly="readonly">
			<input type="hidden"  value="<?php echo ($info["id"]); ?>" name="id" readonly="readonly">
		</div>
	</div>


	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="sex" type="radio" id="sex-1"  value="男" <?php if( $info["sex"] == 男 ): ?>checked<?php endif; ?>>
				<label for="sex-1">男</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" name="sex" value="女" <?php if( $info["sex"] == 女 ): ?>checked<?php endif; ?>>
				<label for="sex-2">女</label>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($info["phone"]); ?>" placeholder="" id="phone" name="phone">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="@" name="email" id="email" value="<?php echo ($info["email"]); ?>">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="adminRole" size="1">
				<?php if(is_array($roles)): $i = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><option value="<?php echo ($value["id"]); ?>" <?php if( $info["role_id"] == $value["id"] ): ?>selected='selected'<?php endif; ?>><?php echo ($value["role_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			</span> </div>
	</div>

	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" id="sub">
		</div>
	</div>
	</form>
</article>

<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="_PUBLIC__/Admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="_PUBLIC__/Admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="_PUBLIC__/Admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			adminName:{
				required:true,
				minlength:4,
				maxlength:16
			},
			password:{
				required:true,
			},
			password2:{
				required:true,
				equalTo: "#password"
			},
			sex:{
				required:true,
			},
			phone:{
				required:true,
				isPhone:true,
			},
			email:{
				required:true,
				email:true,
			},
			adminRole:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "xxxxxxx" ,
				success: function(data){
					layer.msg('添加成功!',{icon:1,time:1000});
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
			});
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script>

<script type="text/javascript">

//管理员：adminName
var adminName=$('input[name=adminName]');
//初始密码：password
var password=$('input[name=password]');
//确认密码：password2
var password2=$('input[name=password2]');
//性别：sex
var sex=$('input[name=sex]');
//手机：phone
var phone=$('input[name=phone]');
//邮箱：email
var email=$('input[name=email]');
//角色：adminRole
var adminRole=$('input[name=adminRole]');
var code=1000;
//编写一个函数，用来判断空格与空值的函数
function judge(jq)
{
    //判断输入框的值是否为空
    var val=jq.val();
    //判断是否有空格
    var r=/\s/g;
    var res=r.test(val);
    if(val==''||res)
    {
        layer.alert('输入值不可以为空以及包含空格');
        return false
    }
}
//给管理员添加失去焦点事件
adminName.focusout(function(){
    judge(adminName);
})
//密码添加失去焦点事件
password.focusout(function(){
    judge(password);
})
//第二次密码添加判断事件（与初始密码是否相同）
password2.focusout(function ()
{
   if(password.val()!=password2.val())
   {
       alert('两次密码不一致');
       return false;
   }
})
//手机添加判断事件
phone.focusout(function(){
    var r=/^1[3|4|5|8]\d{9}$/;
    var res=r.test(phone.val());
//    alert(res);
  if(!res)
  {
      layer.alert('请输入正确的手机号');
      return false;
  }
})
//邮箱添加判断事件
email.focusout(function(){

var r=/^[\w]{7,11}@[0-9a-zA-Z]+(\.[0-9a-zA-Z]+)$/;
var res=r.test(email.val());
    if(!res)
    {
        layer.alert('请输入正确的邮箱号');
        return false;
    }
})
//点击时候进行判断
$('#sub').click(function(){
    $.ajax({
        'url':'/index.php/Admin/Manager/names',
        'data':'name='+adminName.val(),
        'type':'post',
        'dataType':'json',
        'success':function(result){
            code=result.code;
            if(result.code!=1000)
            {
                alert(result.msg);
				  return false;
            }
        }
    })

    judge(adminName);
    judge(password);
    var r=/^1[3|4|5|8]\d{9}$/;
    var res=r.test(phone.val());
//    alert(res);
    if(!res)
    {
        layer.alert('请输入正确的手机号');
        return false;
    }

    var r=/^[\w]{7,11}@[0-9a-zA-Z]+(\.[0-9a-zA-Z]+)$/;
    var res=r.test(email.val());
    if(!res)
    {
        layer.alert('请输入正确的邮箱号');
        return false;
    }

/*
    if(code!=1000)
    {
        alert('名称已经存在');
        return false;
    }
*/
    //发送ajax的简单判断，不能重名



})


</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>