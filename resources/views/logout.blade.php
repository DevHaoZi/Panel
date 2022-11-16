<script type="text/html" template>
    <link rel="stylesheet" href="{{asset('panel/ui/src/css/login.css')}}?v=@{{ layui.admin.v }}-1" media="all">
</script>


<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2>已退出登录</h2>
            <p>页面即将自动跳转</p>
        </div>
    </div>
</div>

<div class="layui-trans layadmin-user-login-footer">

    <p>耗子Linux面板 © 耗子 All Rights Reserved</p>
</div>

<script>
    layui.use(['admin'], function () {
        let admin = layui.admin;
        // 判断并清除定时器
        if (typeof home_timer !== 'undefined') {
            clearInterval(home_timer);
        }
        if (typeof install_plugin_timer !== 'undefined') {
            clearInterval(install_plugin_timer);
        }
        setTimeout(function () {
            admin.exit();
            window.location = "/"
        }, 3000);
    });
</script>