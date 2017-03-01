<!DOCTYPE html>
<!-- saved from url=(0019)http://aiti// -->
<html class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link href="{{asset('public/css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('resources/assets/css/style.css')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="renderer" content="webkit">
    <title> @yield('title','首页')-爱提网</title>
    <meta property="qc:admins" content="156363371216721655">
    <meta name="keywords" content="爱提网">
    <meta name="description" content="爱提网 提问 php laravel ">
    <!--<base href="http://aiti//">--><base href="."><!--[if IE]></base><![endif]-->

    <link href="{{asset('/resources/assets/css/common.css')}}" rel="stylesheet" type="text/css"><!--20150706-->

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



    <style type="text/css">.fancybox-margin{margin-right:17px;}</style></head>
<body  ><noscript unselectable="on" id="noscript">
    &lt;div class="aw-404 aw-404-wrap container"&gt;
    &lt;img src="{{asset('resources/images/avatar/no-js.jpg')}}"&gt;
    &lt;p&gt;你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!&lt;/p&gt;
    &lt;/div&gt;
</noscript>



<div id="app">



<div class="aw-top-menu-wrap" >
    <div class="container">
        <!-- logo -->
        <div class="aw-logo hidden-xs">
            <a href="http://aiti//"></a>
        </div>
        <!-- end logo -->
        <!-- 导航 -->
        <div class="aw-top-nav navbar">
            <div class="navbar-header">
                <button class="navbar-toggle pull-left">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{url('questions/index')}}" class="active"><i class="icon icon-home"></i> 发现</a></li>

                    <li>
                        <a >发起</a>
                        <div class="dropdown-list pull-right">
                            <ul id="extensions-nav-list">
                                <li><a href="{{url('questions/create')}}"><i class="icon icon-topic"></i> 问题</a></li>
                                <li><a href="http://aiti//reader/"><i class="icon icon-reader"></i>文章</a></li>
                            </ul>
                        </div>

                    </li>



                    <li>
                        <a href="{{url('/notifications')}}" class=""><i class="icon icon-bell"></i> 通知</a>
                        <span class="badge badge-important" style="display:none" id="notifications_unread">0</span>
                        <div class="aw-dropdown pull-left hidden-xs">
                            <div class="mod-body">
                                <ul id="header_notification_list"><p class="aw-padding10" align="center">没有未读通知</p></ul>
                            </div>
                            <div class="mod-footer">
                                <a href="http://aiti//notifications/">查看全部</a>
                            </div>
                        </div>
                    </li>
                    {{--<li><a href="http://aiti//qiandao/" class=""><i class="icon icon-date"></i> 签到</a></li>--}}
                    <li>
                        <a style="font-weight:bold;">· · ·</a>
                        <div class="dropdown-list pull-right">
                            <ul id="extensions-nav-list">
                                <li><a href="http://aiti//topic/"><i class="icon icon-topic"></i> 关于作者</a></li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- end 导航 -->
        <!-- 发起 -->
        {{--<div class="aw-publish-btn">--}}
                {{--@if(\Auth::check())--}}
                {{--<a id="header_publish" href="http://aiti//publish/" class="btn-primary"><i class="icon icon-ask"></i>发起</a>--}}
                 {{--@endif--}}
            {{--<div class="dropdown-list pull-right">--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<form method="post" action="http://aiti//publish/">--}}
                            {{--<a onclick="$(this).parents(&#39;form&#39;).submit();">问题</a>--}}
                        {{--</form>--}}

                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<form method="post" action="http://aiti//publish/article/">--}}
                            {{--<a onclick="$(this).parents(&#39;form&#39;).submit();">文章</a>--}}
                        {{--</form>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        <!-- end 发起 -->
        <!-- 用户栏 -->
        <div class="aw-user-nav">
            <!-- 登陆&注册栏 -->
            @if(\Auth::check())
                <a href="" class="aw-user-nav-dropdown">
                    <img alt="{{\Auth::user()->name}}" src="{{\Auth::user()->avatar}}">
                </a>
                <div class="aw-dropdown dropdown-list pull-left">
                    <ul class="aw-dropdown-list">
                        <li><a href="http://aiti//inbox/"><i class="icon icon-inbox"></i> 私信<span class="badge badge-important hide" id="inbox_unread" style="display: none;">0</span></a></li>

                        <li><a href="{{url('/logout')}}"><i class="icon icon-logout"></i> 退出</a></li>
                    </ul>
                </div>
                @else


                    <a href="{{url('/login')}}"  class="pull-right btn btn-mini btn-success publish" style="margin-right: 5px;padding-top:4px;height: 30px;">登录</a>
                    <a href="{{url('/register')}}"  class="pull-right btn btn-mini btn-success publish"style="margin-right: 5px;padding-top:4px;height: 30px;" >注册</a>




            @endif()
            <!-- end 登陆&注册栏 -->
        </div>
        <!-- end 用户栏 -->
        <!-- 搜索框 -->
        <div class="aw-search-box  hidden-xs hidden-sm">
            <form class="navbar-search" action="http://aiti//search/" id="global_search_form" method="post">
                <input class="form-control search-query" type="text" placeholder="搜索问题、话题或人" autocomplete="off" name="q" id="aw-search-query">
                <span title="搜索" id="global_search_btns" onclick="$(&#39;#global_search_form&#39;).submit();"><i class="icon icon-search"></i></span>
                <div class="aw-dropdown" style="display: none;">
                    <div class="mod-body">
                        <p class="title">输入关键字进行搜索</p>
                        <ul class="aw-dropdown-list hide"></ul>
                        <p class="search"><span>搜索:</span><a onclick="$(&#39;#global_search_form&#39;).submit();"></a></p>
                    </div>


                        <div class="mod-footer">
                            <a href="javascript:;" onclick="$(&#39;#header_publish&#39;).click();" class="pull-right btn btn-mini btn-success publish">发起问题</a>
                        </div>

                </div>
            </form>
        </div>
        <!-- end 搜索框 -->
    </div>
</div>


<div class="aw-container-wrap">

    <div class="container">
        <div class="row">
            <div class="aw-content-wrap clearfix">
                @yield('content');


            </div>
        </div>
    </div>
</div>

<a href="http://aiti//#0" class="cd-top"><i class="icon icon-up"></i></a>
<div class="aw-footer-wrap">
    <div class="aw-footer">
        <div class="copy">© 2017 逼乎</div><div class="powered">Powered By WeCenter</div><div class="statistic"></div>
    <!--form action="https://shenghuo.alipay.com/send/payment/fill.htm" method="POST" target="_blank" accept-charset="GBK">
<input name="optEmail" type="hidden" value="papa@ailiaili.com" />
<input name="payAmount" type="hidden" value="6.66" />
<input id="title" name="title" type="hidden" value="赞助逼乎" />
<input name="memo" type="hidden" value="不愧是装逼达人，是在下输了！" />
<input name="pay" type="image" value="转账" src="http://aiti//static/css/default/img/btn-index.png" />
</form-->



    </div>
</div>

<a class="aw-back-top hidden-xs" href="javascript:;" onclick="$.scrollTo(1, 600, {queue:true});"><i class="icon icon-up"></i></a>

<!-- DO NOT REMOVE -->
<div id="aw-ajax-box" class="aw-ajax-box"></div>

<div style="display:none;" id="__crond"><img src="./发现 - 逼乎_files/1487826230" width="1" height="1"></div>

<!-- Escape time: 0.046581983566284 --><!-- / DO NOT REMOVE -->


</div>

<!-- Scripts -->
<script src="{{asset('public/js/app.js')}}"></script>
@yield('js')
<script>
    $('#flash-overlay-modal').modal();
</script>


</body></html>