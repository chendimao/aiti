
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> @yield('title','首页')-爱提网</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="fly,layui,前端社区">
    <meta name="description" content="Fly社区是模块化前端UI框架Layui的官网社区，致力于为web开发提供强劲动力">


    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <link rel="stylesheet" href="../../../public/res/layui/css/layui.css">
    <link rel="stylesheet" href="../../../public/res/css/global.css">
    <script src="../../resources/assets/js/jquery.1.8.3.js"></script>

</head>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>

        Laravel.apiToken="{{\Auth::check()?'Bearer '.Auth::user()->api_token:'Bearer '}}";
    @if(\Auth::check())
        window.Aiti={
        name:"{{Auth::user()->name}}",
        avatar:"{{Auth::user()->avatar}}",
    }
    @endif

</script>


<body>

@yield('content');

<div class="header">
    <div class="main">
        <a class="logo" href="/" title="Fly">Fly社区</a>
        <div class="nav">
            <a class="nav-this" href="jie/index.html">
                <i class="iconfont icon-wenda"></i>问答
            </a>
            <a href="http://www.layui.com/" target="_blank">
                <i class="iconfont icon-ui"></i>框架
            </a>
        </div>

        <div class="nav-user">
            <!-- 未登入状态 -->
           @if(\Auth::check())
                <a class="avatar" href="{{url('/user')}}">
                    <img src="{{\Auth::user()->avatar}}">
                    <cite>{{\Auth::user()->name}}</cite>
                    <i>VIP2</i>
                </a>
                <div class="nav">
                    <a href="{{url('user').'/'.\Auth::user()->id.'/edit'}}"><i class="iconfont icon-shezhi"></i>设置</a>
                    <a href="{{url('/logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="iconfont icon-tuichu"  style="top: 0; font-size: 22px;"></i>退了</a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>

           @else
                <a class="unlogin" href="user/login.html"><i class="iconfont icon-touxiang"></i></a>
                <span><a href="{{url('/login')}}">登入</a><a href="{{secure_url('/register')}}">注册</a></span>
                <p class="out-login">
                    <a href="" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-qq" title="QQ登入"></a>
                    <a href="" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-weibo" title="微博登入"></a>
                </p>
            @endif


        </div>
    </div>
</div>



<div class="footer">
    <p><a href="http://fly.layui.com/">Fly社区</a> 2016 &copy; <a href="http://www.layui.com/">layui.com</a></p>
    <p>
        <a href="http://fly.layui.com/auth/get" target="_blank">产品授权</a>
        <a href="http://fly.layui.com/jie/3147.html" target="_blank">VIP说明</a>
        <a href="http://www.layui.com/" target="_blank">商务合作</a>
        <a href="http://weibo.com/SentsinXu" target="_blank" rel="nofollow">微博</a>
        <a href="http://fly.layui.com/jie/2461.html" target="_blank">微信公众号</a>
    </p>
</div>
<script src="../../public/res/layui/layui.js"></script>
<script>
    layui.cache.page = '';
    layui.cache.user = {
        username: '游客'
        ,uid: -1
        ,avatar: '../res/images/avatar/00.jpg'
        ,experience: 83
        ,sex: '男'
    };
    layui.config({
        version: "1.0.0"
        ,base: '../../../public/res/mods/'
    }).extend({
        fly: 'index'
    }).use('fly');
</script>


<!-- Scripts -->
<script src="../../../public/js/app.js"></script>
<script src="../../resources/assets/js/layer.js"></script>

<script src="../../resources/assets/js/update_img.js"></script>
@yield('js')
<script>
    $('#flash-overlay-modal').modal();
</script>

</body>
</html>