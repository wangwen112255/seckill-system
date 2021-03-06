<?php /*a:2:{s:71:"/var/www/html/seckill-system/application/admin/view/main/role_list.html";i:1610976450;s:68:"/var/www/html/seckill-system/application/admin/view/public/head.html";i:1609921784;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
      <meta charset="UTF-8">
<title>淘多多后台管理</title>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" href="/static/css/font.css">
<link rel="stylesheet" href="/static/css/xadmin.css">
<!-- <link rel="stylesheet" href="./css/theme5.css"> -->
<script src="/static/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/static/js/xadmin.js"></script>
    </head>
    
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a href="">权限</a>
                <a>
                    <cite>角色管理</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <!-- <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5">
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input"  autocomplete="off" placeholder="开始日" name="start" id="start">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input"  autocomplete="off" placeholder="截止日" name="end" id="end">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div> -->
                        <div class="layui-card-header">
                            <button class="layui-btn" onclick="xadmin.open('添加广告','./add_admin.html',600,400)"><i class="layui-icon"></i>添加</button>
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>角色名</th>
                                    <th>拥有权限规则</th>
                                    <th>描述</th>
                                    <th>工具</th></tr>
                                </thead>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tbody>
                                  <tr>
                                    <td><?php echo htmlentities($vo['id']); ?></td>
                                    <td><?php echo htmlentities($vo['name']); ?></td>
                                    <td><?php echo htmlentities($vo['rules']); ?></td>
                                    <td><?php echo htmlentities($vo['description']); ?></td>
                                    <td class="td-manage">
                                      <!-- <a title="编辑"  onclick="xadmin.open('编辑','member-edit.html',600,400)" href="javascript:;">
                                        <i class="layui-icon">&#xe642;</i>
                                      </a> -->
                                      <a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo htmlentities($vo['id']); ?>')" 
                                      style="text-decoration:none">
                                          <i class="layui-icon">&#xe640;</i>
                                      </a>
                                    </td>
                                  </tr>
                                </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
      function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
              $.ajax({
                url: '/index.php/admin/Main/del_role',
                type: "POST",
                data:{"id":id},
                dataType: "json",
                async:true,
                success:function (msg) {
                  if(msg == 1){
                    //发异步删除数据
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                  }
                  if(msg == 0){
                    //发异步删除数据
                    layer.msg('删除失败!',{icon:1,time:1000});
                  }
                },
                error:function(msg){
                  layer.msg("ajax error: ",{icon:1,time:1000});
                }
              });
            });
        }
        layui.use(['laydate','form'], function(){
          var laydate = layui.laydate;
          var  form = layui.form;
  
  
          // 监听全选
          form.on('checkbox(checkall)', function(data){
  
            if(data.elem.checked){
              $('tbody input').prop('checked',true);
            }else{
              $('tbody input').prop('checked',false);
            }
            form.render('checkbox');
          }); 
          
          //执行一个laydate实例
          laydate.render({
            elem: '#start' //指定元素
          });
  
          //执行一个laydate实例
          laydate.render({
            elem: '#end' //指定元素
          });
  
  
        });
  

      </script>

</html>