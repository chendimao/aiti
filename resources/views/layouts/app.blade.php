<!DOCTYPE html>
<!-- saved from url=(0019)http://aiti// -->
<html class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link href="{{asset('public/css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('resources/assets/css/style.css')}}">


    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="renderer" content="webkit">
    <title>首页-爱提网</title>
    <meta property="qc:admins" content="156363371216721655">
    <meta name="keywords" content="逼乎,逼乎网,逼乎官网,bihu,bihuwang,装逼,zhuangbi,是在下输了">
    <meta name="description" content="一个真实的网络装逼社区，帮助你学习装逼，分享装逼。">
    <!--<base href="http://aiti//">--><base href="."><!--[if IE]></base><![endif]-->

    <link rel="stylesheet" type="text/css" href="http://aiti//static/css/nprogress.css">
    <link href="{{asset('/resources/assets/css/common.css')}}" rel="stylesheet" type="text/css"><!--20150706-->




    <script type="text/javascript">
        var _5068117946201B256B894C1C4AA5119B="611bbdb2b3710c67";
        var G_POST_HASH=_5068117946201B256B894C1C4AA5119B;
        var G_INDEX_SCRIPT = "";
        var G_SITE_NAME = "逼乎";
        var G_BASE_URL = "http://aiti/";
        var G_STATIC_URL = "http://aiti//static";
        var G_UPLOAD_URL = "http://aiti//uploads";
        var G_USER_ID = "48247";
        var G_USER_NAME = "一个萝卜一个我";
        var G_UPLOAD_ENABLE = "Y";
        var G_UNREAD_NOTIFICATION = 0;
        var G_NOTIFICATION_INTERVAL = 100000;
        var G_CAN_CREATE_TOPIC = "1";
        var G_ADVANCED_EDITOR_ENABLE = "Y";

    </script>
    <script src="./发现 - 逼乎_files/jquery.2.js.下载" type="text/javascript"></script>
    <script src="./发现 - 逼乎_files/jquery.form.js.下载" type="text/javascript"></script>
    <script src="./发现 - 逼乎_files/plug-in_module.js.下载" type="text/javascript"></script>
    <script src="./发现 - 逼乎_files/aws.js.下载" type="text/javascript"></script>
    <script src="./发现 - 逼乎_files/aw_template.js.下载" type="text/javascript"></script>
    <script src="./发现 - 逼乎_files/app.js.下载" type="text/javascript"></script>
    <script type="text/javascript" src="./发现 - 逼乎_files/compatibility.js.下载"></script>
    <script type="text/javascript" src="./发现 - 逼乎_files/top.js.下载"></script>
    <script src="./发现 - 逼乎_files/sweetalert.min.js.下载"></script>
    <script type="text/javascript">
        NProgress.start();
        NProgress.done();
    </script>
    <style type="text/css">.fancybox-margin{margin-right:17px;}</style></head>
<body><noscript unselectable="on" id="noscript">
    &lt;div class="aw-404 aw-404-wrap container"&gt;
    &lt;img src="{{asset('resources/images/avatar/no-js.jpg')}}"&gt;
    &lt;p&gt;你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!&lt;/p&gt;
    &lt;/div&gt;
</noscript>

<div class="aw-top-menu-wrap">
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
                    <li><a href="http://aiti//" class="active"><i class="icon icon-home"></i> 发现</a></li>
                    <li><a href="http://aiti//home/"><i class="icon icon-list"></i> 动态</a></li>

                    <!-- <li><a href="http://aiti//question/" class="">问题</a></li>

                    <li><a href="http://aiti//article/" class="">文章</a></li> -->

                    <li>
                        <a href="http://aiti//notifications/" class=""><i class="icon icon-bell"></i> 通知</a>
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
                    <li><a href="http://aiti//qiandao/" class=""><i class="icon icon-date"></i> 签到</a></li>
                    <li>
                        <a style="font-weight:bold;">· · ·</a>
                        <div class="dropdown-list pull-right">
                            <ul id="extensions-nav-list">
                                <li><a href="http://aiti//topic/"><i class="icon icon-topic"></i> 话题</a></li>
                                <li><a href="http://aiti//reader/"><i class="icon icon-reader"></i>逼乎阅读</a></li>
                                <li><a href="http://zhuangbi.info/" target="_blank"><i class="icon icon-bold"></i>装逼大全</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- end 导航 -->
        <!-- 发起 -->
        <div class="aw-publish-btn">
            <a id="header_publish" href="http://aiti//publish/" class="btn-primary" onclick="AWS.dialog(&#39;publish&#39;, {&#39;category_enable&#39;:&#39;0&#39;, &#39;category_id&#39;:&#39;0&#39;, &#39;topic_title&#39;:&#39;&#39;}); return false;"><i class="icon icon-ask"></i>发起</a>
            <div class="dropdown-list pull-right">
                <ul>
                    <li>
                        <form method="post" action="http://aiti//publish/">
                            <a onclick="$(this).parents(&#39;form&#39;).submit();">问题</a>
                        </form>

                    </li>
                    <li>
                        <form method="post" action="http://aiti//publish/article/">
                            <a onclick="$(this).parents(&#39;form&#39;).submit();">文章</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end 发起 -->
        <!-- 用户栏 -->
        <div class="aw-user-nav">
            <!-- 登陆&注册栏 -->
            <a href="http://aiti//people/%E4%B8%80%E4%B8%AA%E8%90%9D%E5%8D%9C%E4%B8%80%E4%B8%AA%E6%88%91" class="aw-user-nav-dropdown">
                <img alt="一个萝卜一个我" src="./发现 - 逼乎_files/47_avatar_mid.jpg">

            </a>
            <div class="aw-dropdown dropdown-list pull-left">
                <ul class="aw-dropdown-list">
                    <li><a href="http://aiti//inbox/"><i class="icon icon-inbox"></i> 私信<span class="badge badge-important hide" id="inbox_unread" style="display: none;">0</span></a></li>
                    <li class="hidden-xs"><a href="http://aiti//account/setting/profile/"><i class="icon icon-setting"></i> 设置</a></li>
                    <li><a href="http://aiti//account/logout/"><i class="icon icon-logout"></i> 退出</a></li>
                </ul>
            </div>
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

                <!-- 侧边栏 -->
                <div class="col-sm-12 col-md-3 aw-side-bar hidden-xs hidden-sm">
                    <script type="text/javascript">
                        var ANNOUNCE_CLOSE = '8d53045525';

                        $(document).ready(function()
                        {
                            if (ANNOUNCE_CLOSE != $.cookie('announce_close'))
                            {
                                $('#aw-site-announce').show();
                            }
                        });
                    </script>

                    <div class="aw-mod new-announce hide" id="aw-site-announce" style="display: block;">
                        <div class="mod-head-z">
                            <h3>
                                <a class="pull-right" href="javascript:;" onclick="$(&#39;#aw-site-announce&#39;).fadeOut(); $.cookie(&#39;announce_close&#39;, ANNOUNCE_CLOSE, { expires: 30 });"><i class="icon icon-delete text-color-999"></i></a>
                                装逼王有话要说				</h3>
                        </div>
                        <div class="mod-body">
                            可能修复了未登录导致的网页决绝访问的BUG<br>因CDN缓存，头像更新会存在2小时的延时<br>
                            <a href="https://github.com/kaiki/WeCenterMobile-Api" target="_blank"><i class="icon icon-reader"></i>API文档(github)</a><br>
                            <a href="http://aiti//article/7"><i class="icon icon-comment"></i>意见反馈</a><br>
                            <a href="http://aiti//invitation/"><i class="icon icon-inviteask"></i>邀请好友加入逼乎</a>			</div>
                    </div>
                    <div class="PCD_event_red2015">
                        <div class="WB_feed_spec_red2015">
                            <div class="con_l W_fl">
                                <div class="head_pic W_fl">
                                    <img class="W_face_radius" src="./发现 - 逼乎_files/01_avatar_max.jpg">
                                    <i title="" class="W_icon"></i>
                                </div>
                            </div>
                            <div class="con W_fr">
                                <img class="con_bg" src="./发现 - 逼乎_files/006muzqRjw1ezz3w3pfrsj30e604s0tg.jpg" height="100%" width="100%">
                                <p class="text_1 W_f18 W_autocut">逼乎红包</p>
                                <p class="text_2 W_f14 W_autocut">别发1分的红包了靴靴</p>
                                <button data-fancybox-group="thumb" rel="lightbox" class="text_3 W_f14 W_autocut"> 给装逼王发红包</button>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(function(){
                            $(".W_fr button").click(function(){
                                swal({
                                    title: "给装逼王发红包",
                                    text: '用<span style="color:red">支付宝</span>扫描二维码',
                                    imageUrl: "http://ww4.sinaimg.cn/large/a15b4afegw1ezjp8y9myvj2074074js0",
                                    html: true
                                });
                            });
                        });
                    </script>					<style>
                        .ad{margin-bottom:20px;border:1px dashed #d3d7db;background-color:#fff;color:#3d464d;font-size:.5rem}
                        .ad h1{margin:0;padding:1rem 0;text-align:center;font-size:.8rem}
                        .ad h1,.ad h2{font-weight:600}
                        .ad h2{padding-left:20px;color:#999;text-align:left}
                        .inner_box{padding:0 20px;height:90px}
                        .ad_left{float:left;width:30%;color:#999}
                        .ad_left,.ad_right{overflow:hidden;text-overflow:ellipsis}
                        .ad_right{float:right;width:70%;color:#333;text-align:right;white-space:nowrap}
                        .ad_btn,a.ad_btn:hover{display:block;margin:0 auto 15px;padding:6px;width:200px;border-radius:3px;background-color:#00bff3;color:#fff;text-align:center}

                    </style>
                    <div class="ad">
                        <h1>广告位招租</h1>
                        <h2>广告价格：</h2>
                        <div class="inner_box">
                            <p class="ad_left">按天</p><p class="ad_right">500,000.00 美元</p>
                            <p class="ad_left">按周</p><p class="ad_right">3,000,000.00 美元</p>
                            <p class="ad_left">按月</p><p class="ad_right">12,000,000.00 美元</p>
                        </div>
                        <a class="ad_btn" onclick="AWS.dialog(&#39;inbox&#39;, &#39;装逼王&#39;);">联系我们，月入亿万！</a>
                    </div>										<div class="aw-mod aw-text-align-justify">
                        <div class="mod-head">
                            <h3>热门话题</h3>
                        </div>
                        <div class="mod-body">
                            <dl>
                                <dt class="pull-left aw-border-radius-5">
                                    <a href="http://aiti//topic/11"><img alt="" src="./发现 - 逼乎_files/a1f8b30b566b3002d29090807665992c_50_50.jpg"></a>
                                </dt>
                                <dd class="pull-left">
                                    <p class="clearfix">
						<span class="topic-tag">
							<a href="http://aiti//topic/11" class="text" data-id="11">逼乎</a>
						</span>
                                    </p>
                                    <p><b>205</b> 个问题, <b>129</b> 人关注</p>
                                </dd>
                            </dl>
                            <dl>
                                <dt class="pull-left aw-border-radius-5">
                                    <a href="http://aiti//topic/2"><img alt="" src="./发现 - 逼乎_files/af978fa9061a0f0ba9168dc8228dd4e5_50_50.jpg"></a>
                                </dt>
                                <dd class="pull-left">
                                    <p class="clearfix">
						<span class="topic-tag">
							<a href="http://aiti//topic/2" class="text" data-id="2">装逼</a>
						</span>
                                    </p>
                                    <p><b>816</b> 个问题, <b>423</b> 人关注</p>
                                </dd>
                            </dl>
                            <dl>
                                <dt class="pull-left aw-border-radius-5">
                                    <a href="http://aiti//topic/320"><img alt="" src="./发现 - 逼乎_files/topic-mid-img.png"></a>
                                </dt>
                                <dd class="pull-left">
                                    <p class="clearfix">
						<span class="topic-tag">
							<a href="http://aiti//topic/320" class="text" data-id="320">GFW</a>
						</span>
                                    </p>
                                    <p><b>3</b> 个问题, <b>7</b> 人关注</p>
                                </dd>
                            </dl>
                            <dl>
                                <dt class="pull-left aw-border-radius-5">
                                    <a href="http://aiti//topic/761"><img alt="" src="./发现 - 逼乎_files/topic-mid-img.png"></a>
                                </dt>
                                <dd class="pull-left">
                                    <p class="clearfix">
						<span class="topic-tag">
							<a href="http://aiti//topic/761" class="text" data-id="761">歌手</a>
						</span>
                                    </p>
                                    <p><b>2</b> 个问题, <b>4</b> 人关注</p>
                                </dd>
                            </dl>
                            <dl>
                                <dt class="pull-left aw-border-radius-5">
                                    <a href="http://aiti//topic/973"><img alt="" src="./发现 - 逼乎_files/topic-mid-img.png"></a>
                                </dt>
                                <dd class="pull-left">
                                    <p class="clearfix">
						<span class="topic-tag">
							<a href="http://aiti//topic/973" class="text" data-id="973">辩论</a>
						</span>
                                    </p>
                                    <p><b>2</b> 个问题, <b>4</b> 人关注</p>
                                </dd>
                            </dl>
                        </div>
                        <a href="http://aiti//topic/channel-hot" class="interest-m">查看更多 &gt;</a>
                    </div>
                    <div class="aw-mod aw-text-align-justify">
                        <div class="mod-head">
                            <h3>热门用户</h3>
                        </div>
                        <div class="mod-body">

                            <dl>
                                <dt class="pull-left aw-border-radius-5 hot_user">
                                    <a href="http://aiti//people/%E6%9D%BE%E6%9C%AC%E8%8A%BD%E4%BE%9D"><img alt="" src="./发现 - 逼乎_files/26_avatar_mid(1).jpg"></a>
                                </dt>
                                <dd class="pull-left">
                                    <a href="http://aiti//people/%E6%9D%BE%E6%9C%AC%E8%8A%BD%E4%BE%9D" data-id="37926" class="aw-user-name">松本芽依						</a>
                                    <p class="signature"></p>
                                    <p><b>13</b> 个问题, <b>7</b> 次赞同</p>
                                </dd>
                            </dl>

                            <dl>
                                <dt class="pull-left aw-border-radius-5 hot_user">
                                    <a href="http://aiti//people/sonychina"><img alt="" src="./发现 - 逼乎_files/59_avatar_mid.jpg"></a>
                                </dt>
                                <dd class="pull-left">
                                    <a href="http://aiti//people/sonychina" data-id="3259" class="aw-user-name">索尼中国						</a>
                                    <p class="signature"></p>
                                    <p><b>16</b> 个问题, <b>26</b> 次赞同</p>
                                </dd>
                            </dl>

                            <dl>
                                <dt class="pull-left aw-border-radius-5 hot_user">
                                    <a href="http://aiti//people/%E7%9C%9F%E4%B8%BB"><img alt="" src="./发现 - 逼乎_files/07_avatar_mid.jpg"></a>
                                </dt>
                                <dd class="pull-left">
                                    <a href="http://aiti//people/%E7%9C%9F%E4%B8%BB" data-id="46507" class="aw-user-name">真主						</a>
                                    <p class="signature"></p>
                                    <p><b>15</b> 个问题, <b>24</b> 次赞同</p>
                                </dd>
                            </dl>

                            <dl>
                                <dt class="pull-left aw-border-radius-5 hot_user">
                                    <a href="http://aiti//people/mswj"><img alt="" src="./发现 - 逼乎_files/81_avatar_mid.jpg"></a>
                                </dt>
                                <dd class="pull-left">
                                    <a href="http://aiti//people/mswj" data-id="32881" class="aw-user-name">360安全卫士						</a>
                                    <p class="signature"></p>
                                    <p><b>24</b> 个问题, <b>29</b> 次赞同</p>
                                </dd>
                            </dl>

                            <dl>
                                <dt class="pull-left aw-border-radius-5 hot_user">
                                    <a href="http://aiti//people/HRX"><img alt="" src="./发现 - 逼乎_files/08_avatar_mid.jpg"></a>
                                </dt>
                                <dd class="pull-left">
                                    <a href="http://aiti//people/HRX" data-id="44608" class="aw-user-name">NVIDIA黄仁勋						</a>
                                    <p class="signature"></p>
                                    <p><b>12</b> 个问题, <b>0</b> 次赞同</p>
                                </dd>
                            </dl>
                        </div>
                        <a href="http://aiti//people/" class="interest-m">查看更多 &gt;</a>
                    </div>					<div class="aw-mod aw-text-align-justify">
                        <div class="mod-head">
                            <h3>下载APP</h3>
                        </div>
                        <div class="mod-body">
                            <img src="./发现 - 逼乎_files/noapp.png" style="margin: 15px 0 0;">
                            <!--预留模块，万一以后真有APP了呢-->
                        </div>
                    </div>
                </div>
                <!-- end 侧边栏 -->
            </div>
        </div>
    </div>
</div>

<a href="http://aiti//#0" class="cd-top"><i class="icon icon-up"></i></a>
<div class="aw-footer-wrap">
    <div class="aw-footer">
        <div class="copy">© 2017 逼乎</div><div class="powered">Powered By WeCenter</div><div class="statistic"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1255857609'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1255857609%26online%3D2' type='text/javascript'%3E%3C/script%3E"));</script><span id="cnzz_stat_icon_1255857609"><a href="http://www.cnzz.com/stat/website.php?web_id=1255857609" target="_blank">站长统计</a>-<a href="http://www.cnzz.com/stat/website.php?web_id=1255857609&amp;method=online" target="_blank">当前在线[6]</a></span><script src="./发现 - 逼乎_files/z_stat.php" type="text/javascript"></script><script src="./发现 - 逼乎_files/core.php" charset="utf-8" type="text/javascript"></script></div>
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



</body></html>