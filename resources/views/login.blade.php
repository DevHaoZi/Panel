<script type="text/html" template>
    <link rel="stylesheet" href="{{asset('panel/ui/src/css/login.css')}}?v=@{{ layui.admin.v }}-1" media="all">
</script>


<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2 id="login-panel-name">{{ config('panel.name') }}</h2>
            <p></p>
        </div>
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username"
                       for="username"></label>
                <input type="text" name="username" id="username" lay-verify="required" placeholder="用户名"
                       class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password"
                       for="password"></label>
                <input type="password" name="password" id="password" lay-verify="required"
                       placeholder="密码" class="layui-input">
            </div>
            <div class="layui-form-item" style="margin-bottom: 20px;">
                <input type="checkbox" name="remember" id="remember" lay-skin="primary" title="记住我">
                <a href="https://hzbk.net/" class="layadmin-user-jump-change layadmin-link"
                   style="margin-top: 7px;">忘记密码？</a>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="panel-login-submit">登 入</button>
            </div>
        </div>
    </div>

    <div class="layui-trans layadmin-user-login-footer">

        <p>耗子Linux面板 © 耗子 All Rights Reserved</p>
    </div>

</div>

<script>
    layui.use(['admin', 'form', 'user'], function () {
        let $ = layui.$
            , setter = layui.setter
            , admin = layui.admin
            , form = layui.form
            , router = layui.router()
            , search = router.search;

        form.render();

        //提交
        form.on('submit(panel-login-submit)', function (obj) {

            // 判断obj.field.remember是否存在
            if (obj.field.remember) {
                obj.field.remember = 1;
            } else {
                obj.field.remember = 0;
            }
            admin.req({
                url: '/api/panel/user/login'
                , data: obj.field
                , method: 'post'
                , done: function (res) {
                    // 请求成功后，写入 access_token
                    layui.data(setter.tableName, {
                        key: setter.request.tokenName
                        , value: res.data.access_token
                    });

                    // 登入成功的提示与跳转
                    layer.msg('登录成功', {
                        offset: '15px'
                        , icon: 1
                        , time: 1000
                    }, function () {
                        location.hash = search.redirect ? decodeURIComponent(search.redirect) : '/';
                    });
                }
            });

        });
    });
</script>