@extends('layouts.app')

@section('content')

    <div class="main layui-clear" style="min-height: 600px;">

        <h2 class="page-title">帐号设置</h2>

        <div class="fly-tab user-tab">
    <span id="LAY-mine">
      <a href="javascript:;" class="tab-this" id="info">我的资料</a>
      <a href="javascript:;" id="avatar">头像</a>
      <a href="javascript:;" id="pass">密码</a>
      <a href="javascript:;" id="bind">帐号绑定</a>
    </span>
        </div>

        <div class="user-mine">
            <div class="layui-form layui-form-pane mine-view" id="this_info" style="display: block;">
                <form action="/user/{{\Auth::user()->id}}"method="post" id="update_form">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="layui-form-item layui-form-text">
                        <label for="L_sign" class="layui-form-label">签名</label>
                        <div class="layui-input-block">
                            <textarea placeholder="随便写些什么刷下存在感" id="summary"  name="summary" autocomplete="off" class="layui-textarea" style="height: 80px;">@if($user->summary!=null){{$user->summary}}@else这个人比较懒，没有留下签名@endif</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <button type="button" class="layui-btn"  id="update">确认修改</button>

                    </div>
            </form>
            </div>
            <div class="layui-form layui-form-pane mine-view" id="this_avatar">
                <div class="layui-form-item">
                    <div class="avatar-add">
                        <p>建议尺寸168*168，支持jpg、png、gif，最大不能超过30KB</p>
                        <div class="upload-img">
                            <form action="/user/upavatar" method="post" id="upload_avatar" onsubmit="return false;" enctype = "multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <input type="file" name="file" value="nihaoaa" id="up-avatar" lay-title="上传头像" onchange="selfile()">

                            </form>
                        </div>
                        <img src="{{\Auth::user()->avatar}}">
                        <span class="loading"></span>
                    </div>
                </div>
            </div>

            <div class="layui-form layui-form-pane mine-view" id="this_pass">
                <form action="/user/repass" method="post">
                    <div class="layui-form-item">
                        <label for="L_nowpass" class="layui-form-label">当前密码</label>
                        <div class="layui-input-inline">
                            <input type="password" id="L_nowpass" name="nowpass" required lay-verify="required" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_pass" class="layui-form-label">新密码</label>
                        <div class="layui-input-inline">
                            <input type="password" id="L_pass" name="password" required lay-verify="required" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">6到16个字符</div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">确认密码</label>
                        <div class="layui-input-inline">
                            <input type="password" id="L_repass" name="repass" required lay-verify="required" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <button class="layui-btn" key="set-mine" lay-filter="*" lay-submit>确认修改</button>
                    </div>
                </form>
            </div>

            <div class="layui-form layui-form-pane mine-view" id="this_bind">
                <ul class="app-bind">
                    <li class="fly-msg  ">
                        <i class="iconfont icon-qq"></i>
                        <span>已成功绑定，您可以使用QQ帐号直接登录Fly社区，当然，您也可以</span>
                        <a href="javascript:;" class="acc-unbind" type="qq_id">解除绑定</a>

                        <!-- <a href="" onclick="layer.msg('正在绑定微博QQ', {icon:16, shade: 0.1, time:0})" class="acc-bind" type="qq_id">立即绑定</a>
                        <span>，即可使用QQ帐号登录Fly社区</span> -->
                    </li>
                    <li class="fly-msg">
                        <i class="iconfont icon-weibo"></i>
                        <!-- <span>已成功绑定，您可以使用微博直接登录Fly社区，当然，您也可以</span>
                        <a href="javascript:;" class="acc-unbind" type="weibo_id">解除绑定</a> -->

                        <a href="" class="acc-weibo" type="weibo_id"  onclick="layer.msg('正在绑定微博', {icon:16, shade: 0.1, time:0})" >立即绑定</a>
                        <span>，即可使用微博帐号登录Fly社区</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    </div>

    <script>
        $(document).ready(function(){

                $("#info").click(function(){
                    $("#info").addClass('tab-this');
                    $("#info").siblings().removeClass('tab-this');
                    $("#this_info").show().addClass('tab-this');
                    $("#this_info").siblings().hide();

                });

            $("#avatar").click(function(){
                $("#avatar").addClass('tab-this');
                $("#avatar").siblings().removeClass('tab-this');
                $("#this_avatar").siblings().hide().removeClass('tab-this');
                $("#this_avatar").show().addClass('tab-this');
            })

            $("#pass").click(function(){

                $("#pass").addClass('tab-this');
                $("#pass").siblings().removeClass('tab-this');
                $("#this_pass").siblings().hide().removeClass('tab-this');
                $("#this_pass").show().addClass('tab-this');

            })


            $("#bind").click(function(){
                $("#bind").addClass('tab-this');
                $("#bind").siblings().removeClass('tab-this');
                $("#this_bind").addClass('.tab-this').show();
                $("#this_bind").siblings().hide().removeClass('.tab-this');
            })

        $("#test").click=function(){
                alert(3);
        }
        })
    </script>

    <script>


        $("#update").click(function(){




                    $.ajax({
                        cache: true,
                        type: "POST",
                        url:"/user/{{\Auth::user()->id}}",
                        data:$('#update_form').submit(),// 你的formid
                        async: true,
                        error: function(request) {
                            layer.msg('更新数据失败');
                        },
                        success: function(data) {
                            layer.msg('更新数据成功');
                        }
                    });


                    //这样报错原，所以只能用上面方法

            {{--$.post("/user/{{\Auth::user()->id}}",{'_token':"{{csrf_token()}}",'_method':'{{method_field('PATCH')}}'},function () {--}}

            {{--});--}}


        })



        function selfile(){

            var fd=new FormData();

            var avatar=$("#up-avatar").files[0];

            $.ajax({
                cache: false,
                type: "POST",
                url:"/user/upavatar",
                data:{'fd':fd,'_token':'{{csrf_token()}}'},// 你的formid
                async: true,
                error: function(request) {
                    layer.msg('失败');
                },
                success: function(data) {
                    layer.msg('成功');
                }
            });




        }

    </script>


@endsection
