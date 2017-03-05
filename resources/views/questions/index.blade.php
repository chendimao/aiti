@extends('layouts.app')


<style>
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

@section('content')

    <div class="col-sm-12 col-md-9 aw-main-content" style="background-color: rgba(255, 255, 255, 0);">
        <!-- 新消息通知 -->
        <div class="aw-mod aw-notification-box hide" id="index_notification">
            <div class="mod-head common-head">
                <h2>
                    <span class="pull-right"><a href="" class="text-color-999"><i class="icon icon-setting"></i> 通知设置</a></span>
                    <i class="icon icon-bell"></i>新通知<em class="badge badge-important" name="notification_unread_num">0</em>
                </h2>
            </div>
            <div class="mod-body">
                <ul id="notification_list"></ul>
            </div>
            <div class="mod-footer clearfix">
                <a href="javascript:;" onclick="AWS.Message.read_notification(false, 0, false);" class="pull-left btn btn-mini btn-gray">我知道了</a>
                <a href="" class="pull-right btn btn-mini btn-success">查看所有</a>
            </div>
        </div>
        <!-- end 新消息通知 -->
        <!-- tab切换 -->
        <ul class="nav nav-tabs aw-nav-tabs active hidden-xs" id="question_tab">
            <li class="active"><a href="{{secure_url('/?order=news')}}">最新</a></li>
            <li><a href="{{secure_url('/?order=hot')}}" >热门</a></li>
            <li><a href="{{secure_url('/?order=empty')}}">等待回复</a></li>
        </ul>
        <!-- end tab切换 -->


        <div class="aw-mod aw-explore-list">
            <div class="mod-body">
                <div class="aw-common-list">

                    @foreach($questions as $question)



                    <div class="aw-item " data-topic-id="1792," id="content">
                        <a class="aw-user-name hidden-xs" data-id="44767" href="http://zhuangbi.me/people/%E7%99%BD%E7%BE%8A" rel="nofollow"><img src="{{$question['belongs_to_user']['avatar']}}" alt=""></a>	<div class="aw-question-content">
                            <h4>
                                <a href="{{secure_url('questions/'.$question['id'])}}">{{$question['title']}}</a>
                            </h4>
                            <h5 style="height:72px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                {!! $question['body'] !!}
                            </h5>

                            <p>
                                <a href="" class="aw-user-name" data-id="36098"><!--<img class="img" style="height: 16px;width: 16px;border-radius: 50%;margin: -3px 3px 0 0;" src="./发现 - 逼乎_files/avatar-min-img.png" alt=""></a> -->				<!--<span class="text-color-999">回复了问题 • -->{{$question['followers_count']}} 人关注 • {{$question['answers_count']}} 个回复 • {{$question['browse_count']}} 次浏览 • 3 小时前		</a>		</span>

                            </p>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
            <div class="mod-footer">
                <div class="page-control"><ul class="pagination pull-right">{{ $paginator->render() }}</ul></div>						</div>
        </div>
    </div>
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
        </script>

        <div class="ad">
            <h1>广告位招租</h1>
            <h2>广告价格：</h2>
            <div class="inner_box">
                <p class="ad_left">按天</p><p class="ad_right">500,000.00 美元</p>
                <p class="ad_left">按周</p><p class="ad_right">3,000,000.00 美元</p>
                <p class="ad_left">按月</p><p class="ad_right">12,000,000.00 美元</p>
            </div>
            <send-message-button class="ad_btn"></send-message-button>
        </div>
            <div class="aw-mod aw-text-align-justify">
                <div class="mod-head">
                    <h3>热门话题</h3>
                </div>
                <div class="mod-body">
                <dl>
                    <dt class="pull-left aw-border-radius-5">
                        <a href="http://aiti//topic/11"><img alt="" src=""></a>
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
                        <a href="http://aiti//topic/2"><img alt="" src=""></a>
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
                        <a href="http://aiti//topic/320"><img alt="" src=""></a>
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
                        <a href="http://aiti//topic/761"><img alt="" src=""></a>
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
                        <a href="http://aiti//topic/973"><img alt="" src=""></a>
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

        </div>
    </div>
    <!-- end 侧边栏 -->

@endsection


