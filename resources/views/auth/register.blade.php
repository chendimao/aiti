@extends('layouts.app')

@section('content')

    <div class="main layui-clear">
        <h2 class="page-title">注册</h2>
        <div class="layui-form layui-form-pane">
            <form method="post" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">邮箱</label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="email" required lay-verify="email" autocomplete="off" class="layui-input">
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @else
                        <div class="layui-form-mid layui-word-aux">将会成为您唯一的登入名</div>

                    @endif

                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">昵称</label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="name" required lay-verify="required" autocomplete="off" class="layui-input">
                    </div>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">密码</label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_pass" name="password" required lay-verify="required" autocomplete="off" class="layui-input">
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @else
                        <div class="layui-form-mid layui-word-aux">6到16个字符</div>

                    @endif
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label" >确认密码</label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_repass" name="password_confirmation" required lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_vercode" class="layui-form-label">人类验证</label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_vercode" name="vercode" required lay-verify="required" placeholder="请回答后面的问题" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid">
                        <span style="color: #c00;"></span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-filter="*" lay-submit>立即注册</button>
                </div>
                <div class="layui-form-item fly-form-app">
                    <span>或者直接使用社交账号快捷注册</span>
                    <a href="" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-qq" title="QQ登入"></a>
                    <a href="" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-weibo" title="微博登入"></a>
                </div>
            </form>
        </div>
    </div>



@endsection
