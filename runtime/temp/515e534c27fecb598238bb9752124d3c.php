<?php /*a:1:{s:68:"/var/www/html/seckill-system/application/admin/view/login/index.html";i:1610949346;}*/ ?>
<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>淘多多商城-后台登录</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/static/css/font.css">
    <link rel="stylesheet" href="/static/css/login.css">
	  <link rel="stylesheet" href="/static/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">淘多多商城-后台登录</div>
        <div id="darkbannerwrap"></div>
        
        <form id="form1" name="form1" method="post" class="layui-form" action="/index.php/admin/Login/dologin">
            
            <input name="username" placeholder="用户名"  type="text" lay-verify="required|name" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required|password" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <div class="layui-input-inline">
            <input name="verifyCode" lay-verify="required" placeholder="请输入验证码"  type="text" class="layui-input"></div>
            <div class="layui-input-inline"><img src="<?php echo captcha_src(); ?>" height=50px width=160px class="verifyimg reloadverify"></div>
            <hr class="hr15">
            <button class="layui-btn layui-btn-lg" lay-submit lay-filter="login" style="width:100%;" type="submit">登录</button>

            <hr class="hr20" >
        </form>
    </div>

    <script type="text/javascript">
    
    layui.use("form", function() {
        var form = layui.form;
        form.verify({
            // character : function(value, item) {
            //     if (value.indexOf("<") > -1 || value.indexOf(">") > -1 || 
            //         value.indexOf("'") > -1 || value.indexOf("\"") > -1 || 
            //         value.indexOf("&") > -1 || value.indexOf("%") > -1 ||
            //         value.indexOf("#") > -1 || value.indexOf("?") > -1) {
            //         return "不能包含【<】【>】【'】【\"】【&】【%】【#】【?】";
            //     }
            // }
            name: function(value){
                //alert(/^[a-zA-Z]\w{2,14}$/.test(value));
                if(! /^[a-zA-Z]\w{2,14}$/.test(value)){
                    return '字母开头，可以包含字母、数字、下划线，3-15个字符';
                }
            }
            ,password: function(value){
                if(! /^[a-zA-Z0-9]{6,20}$/.test(value)){
                    return '密码必须6到20位，只能是字母和数字';
                }
            }
        });
        // form.on('submit(login)', function (data) {
        //     $.ajax({
        //         url:'/index.php/admin/login/dologin',
        //         type:'post',
        //         data:data.field,
        //         dataType:"json ",
        //         success:function(data){
        //             if(data==1){
        //                 layer.alert("提交成功！")
        //             }
        //             else{
        //                 layer.alert("提交失败1！")
        //             }
        //         },
        //         error:function(e){
        //         layer.alert("提交失败2！")
        //         },
                
        //     });
        //     return false;
        // });
    });


  </script>
  <script  src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
  
  <script>
    $(function(){
            // 刷新验证码
            var verifyimg = $(".verifyimg").attr("src");
            $(".reloadverify").click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });
        })
</script>
    <!-- 底部结束 -->
</body>
</html>