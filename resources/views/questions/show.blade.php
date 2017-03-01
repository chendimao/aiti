@extends('layouts.app')

@section('title',$question->title)

@section('content')

    <link href="{{asset('resources/assets/css/question_content.css')}}" rel="stylesheet" type="text/css"><!--20150706-->



    <div class="aw-container-wrap">
        @include('UEditor::head');

        <div class="container">
            <div class="row">
                <div class="aw-content-wrap clearfix">
                    <div class="col-sm-12 col-md-9 aw-main-content">
                        <!-- 话题推荐bar -->
                        <div class="question-comment" >
                            <!-- 话题推荐bar -->
                            <!-- 话题bar -->

                            @foreach($question->belongsToManyTopic as $topic)
                                    <span class="topic-tag" data-id="1151" style="margin-left:15px;">
								         <a href="/topic/{{$topic->id}}" class="text">{{$topic->name}}</a>
                                    </span>
                            @endforeach
                            <!-- end 话题bar -->
                            <div class="aw-mod aw-question-detail aw-item">
                                <div class="mod-head">
                                    <h1>{!! $question->title !!}</h1>

                                    <div class="operate clearfix">
                                        <question-follow-button question="{{$question->id}}" follower_count="{{$question->followers_count}}"></question-follow-button>
                                        <!-- 下拉菜单 -->


                                                        @if(\Auth::check()&& \Auth::user()->owns($question))
                                            <div class="btn-group pull-left">
                                                <a class="btn btn-gray dropdown-toggle" data-toggle="dropdown" href="javascript:;">...</a>
                                                <div class="aw-dropdown pull-right" role="menu" aria-labelledby="dropdownMenu">
                                                    <ul class="aw-dropdown-list">
                                                        <li>
                                                            <a href="/questions/{{$question->id}}/edit" rel="nofollow">编辑</a>
                                                        </li>
                                                        <li>


                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                                    @endif



                                        <!-- end 下拉菜单 -->
                                    </div>
                                </div>
                                <div class="mod-body">
                                    <div class="content markitup-box">
                                        <h3>{!! $question->body !!}</h3>

                                    </div>
                                </div>
                                <div class="mod-footer">
                                    <div class="meta">
                                        <span class="text-color-999">1 天前</span>

                                        <a data-id="2847" data-type="question" class="aw-add-comment text-color-999 active" data-comment-count="1" data-first-click=""><i class="icon icon-comment"></i>1 条评论</a>

                                        <a class="text-color-999 aw-invite-replay"><i class="icon icon-invite"></i>邀请 </a>


                                        <div class="pull-right more-operate">
                                            <a data-placement="bottom" title="" data-toggle="tooltip" data-original-title="感谢提问者" onclick="AWS.User.question_thanks($(this), 2847);" class="aw-icon-thank-tips text-color-999"><i class="icon icon-thank"></i>感谢</a>

                                            <!-- <a class="text-color-999"  onclick="AWS.dialog('shareOut', {item_type:'question', item_id:2847});"> -->
                                            <a class="text-color-999 dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon icon-share"></i>分享									</a>
                                            <div aria-labelledby="dropdownMenu" role="menu" class="aw-dropdown shareout pull-right">
                                                <ul class="aw-dropdown-list">
                                                    <li><a onclick="AWS.User.share_out({webid: &#39;tsina&#39;,appkey: &#39;3944433828&#39;, content: $(this).parents(&#39;.aw-question-detail&#39;).find(&#39;.markitup-box&#39;)});"><i class="icon icon-weibo"></i> 微博</a></li>
                                                    <li><a onclick="AWS.User.share_out({webid: &#39;qzone&#39;,appkey: &#39;101232613&#39;, content: $(this).parents(&#39;.aw-question-detail&#39;)});"><i class="icon icon-qzone"></i> QZONE</a></li>
                                                    <li><a onclick="AWS.User.share_out({webid: &#39;weixin&#39;,appkey: &#39;0&#39;, content: $(this).parents(&#39;.aw-question-detail&#39;)});"><i class="icon icon-wechat"></i> 微信</a></li>
                                                </ul>
                                            </div>

                                            <a href="javascript:;" class="text-color-999" onclick="AWS.dialog(&#39;report&#39;, {item_type:&#39;question&#39;, item_id:2847})"><i class="icon icon-report"></i>举报</a>								</div>
                                    </div>
                                </div>

                                <!-- 相关链接 -->
                                <div class="aw-question-related-box hide">
                                    <form action="http://zhuangbi.me/publish/ajax/save_related_link/" method="post" onsubmit="return false" id="related_link_form">
                                        <div class="mod-head">
                                            <h2>与内容相关的链接</h2>
                                        </div>
                                        <div class="mod-body clearfix">
                                            <input type="hidden" name="item_id" value="2847">
                                            <input type="text" class="form-control pull-left" name="link" value="">

                                            <a onclick="AWS.ajax_post($(&#39;#related_link_form&#39;));" class="pull-left btn btn-success">提交</a>
                                        </div>
                                    </form>
                                </div>
                                <!-- end 相关链接 -->
                            </div>

                        </div>

                        <div class="aw-mod aw-question-comment">
                            <div class="mod-head">
                                <ul class="nav nav-tabs aw-nav-tabs active">
                                    <li class="active"><a href="http://zhuangbi.me/question/2847&amp;sort_key=agree_count&amp;sort=DESC">按票数排序</a></li>
                                    <li><a href="http://zhuangbi.me/question/2847?sort_key=add_time&amp;sort=DESC">按时间排序</a></li>
                                    <li><a href="http://zhuangbi.me/question/2847?sort_key=add_time&amp;sort=ASC">按时间倒序</a></li>
                                    <li><a href="http://zhuangbi.me/question/2847?uid=focus">只看关注的人</a></li>


                                    <h2 class="hidden-xs">{{$question->answers_count}} 个回复</h2>
                                </ul>
                            </div>
                            <div class="mod-body aw-feed-list">

                                @foreach($question->hasManyAnswer as $answer)
                                <div class="aw-item" uninterested_count="0" force_fold="0" id="answer_list_20537">
                                    <div class="mod-head">
                                        <a class="anchor" name="answer_20537"></a>
                                        <!-- 用户头像 -->
                                        <a class="aw-user-img aw-border-radius-5" href="{{$answer->belongsToUser->avatar}}" data-id="46257"><img src="{{$answer->belongsToUser->avatar}}" alt="{{$answer->belongsToUser->name}}"></a>										<!-- end 用户头像 -->
                                        <div class="title">
                                            <p>
                                                <a class="aw-user-name" href="http://zhuangbi.me/people/%E6%A5%A0%E7%9D%BF%E4%B8%8D%E5%8F%AF%E5%BD%93" data-id="46257">{{$answer->belongsToUser->name}}</a>
                                            </p>
                                            <p class="text-color-999 aw-agree-by hide">
                                                赞同来自:

                                            </p>


                                        </div>
                                    </div>

                                    <div class="mod-body clearfix">
                                        <!-- 评论内容 -->

                                        <div class="markitup-box">
                                            {!! $answer->body!!}
                                        </div>

                                        <!-- end 评论内容 -->
                                    </div>
                                    <div class="mod-footer">
                                        <!-- 社交操作 -->
                                        <div class="meta clearfix">
                                          <commend-button user="{{$answer->id}}" z-index="8888"></commend-button><span class="pull-right">点赞：</span>
                                            <!-- 投票栏 -->
                                            <span class="operate">


                                            <!-- 可显示/隐藏的操作box -->
                                            <div class="more-operate">

                                                <div class="btn-group pull-left">
                                                    <a class="text-color-999 dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon icon-share"></i> 分享													</a>
                                                    <div aria-labelledby="dropdownMenu" role="menu" class="aw-dropdown shareout pull-right">
                                                        <ul class="aw-dropdown-list">
                                                            <li style="float: left;"><a onclick="AWS.User.share_out({webid: &#39;tsina&#39;,appkey: &#39;3944433828&#39;, title: $(this).parents(&#39;.aw-item&#39;).find(&#39;.markitup-box&#39;).text()});"><i class="icon icon-weibo"></i><!--微博--></a></li>
                                                            <li style="float: left;"><a onclick="AWS.User.share_out({webid: &#39;qzone&#39;,appkey: &#39;101232613&#39;, title: $(this).parents(&#39;.aw-item&#39;).find(&#39;.markitup-box&#39;).text()});"><i class="icon icon-qzone"></i><!--QZONE--></a></li>
                                                            <li style="float: left;"><a onclick="AWS.User.share_out({webid: &#39;weixin&#39;,appkey: &#39;0&#39;, title: $(this).parents(&#39;.aw-item&#39;).find(&#39;.markitup-box&#39;).text()});"><i class="icon icon-wechat"></i><!--微信--></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end 可显示/隐藏的操作box -->

                                        </div>
                                        <!-- end 社交操作 -->
                                    </div>
                                </div>

                                @endforeach





                            </div>
                            <div class="mod-footer">
                                <div class="aw-load-more-content hide" id="load_uninterested_answers">
                                    <span class="text-color-999 aw-alert-box text-color-999" href="javascript:;" tabindex="-1" onclick="AWS.alert(&#39;被折叠的回复是被你或者被大多数用户认为没有帮助的回复&#39;);">为什么被折叠?</span>
                                    <a href="javascript:;" class="aw-load-more-content"><span class="hide_answers_count">0</span> 个回复被折叠</a>
                                </div>

                                <div class="hide aw-feed-list" id="uninterested_answers_list"></div>
                            </div>

                        </div>
                        <!-- end 问题详细模块 -->

                        <!-- 回复编辑器 -->
                        <div class="aw-mod aw-replay-box question">
                            <a name="answer_form"></a>

                                <div id="answerNotify" class="answerNotify">
                                    <button type="button" class="close" data-dismiss="alert"></button>
                                    <p>如果你是要对问题或其他回答进行点评或询问，请使用“评论”功能。</p>
                                    <p>发布的内容中不得包含其他用户的个人信息。包括实际地址、邮箱地址、电话号码及不当的照片和/或视频。</p>
                                    <p>不得包含骚扰或歧视性用语。</p>
                                </div>
                                <div class="mod-body">
                                    <div class="aw-mod aw-editor-box">
                                        <div class="mod-head">
                                            <div class="mod-body">

                                                @if(Auth::check())

                                                    <form action="/questions/{{$question->id}}/answer" method='post'>
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">



                                                        <div class="form-group {{$errors->has('body'?'has-error':'')}}" >
                                                            <script id="container" name="body" style="height:150px;" type="text/plain">
                                                                {!! old('body') !!}
                                                            </script>
                                                        </div>
                                                        @if($errors->has('body'))
                                                            <span class="help-block">
                                                                 <strong style="color:red;">{{$errors->first('body')}}</strong>
                                                             </span>
                                                        @endif
                                                        <button class="btn btn-success pull-right" type="submit">回复</button>
                                                    </form>

                                                @else()
                                                    <a href="/login" class='btn btn-success'>登录</a>
                                                @endif



                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <!-- end 回复编辑器 -->
                    </div>
                    <!-- 侧边栏 -->
                    <div class="col-md-3 aw-side-bar hidden-xs hidden-sm">
                        <!-- 发起人 -->
                        <div class="aw-mod">
                            <div class="mod-head">
                                <h3>发起人</h3>
                            </div>
                            <div class="mod-body">
                                <dl>
                                    <dt class="pull-left aw-border-radius-5">
                                        <img src="{{$question->belongsToUser->avatar}}" alt="{{$question->belongsToUser->name}}" style="width:30px;height:30px;">
                                    </dt>
                                    <dd class="pull-left">
                                        <a class="aw-user-name" href="" data-id="31038">{{$question->belongsToUser->name}}</a>
                                        <user-follow-button user="{{$question->user_id}}"></user-follow-button>

                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <!-- end 发起人 -->

                        <!-- 邀请别人回复 --
    <div class="aw-mod email-invite-replay">
        <div class="mod-head">
            <h3>邮件邀请别人回复</h3>
        </div>
        <div class="mod-body clearfix">
            <form method="post" action="http://zhuangbi.me/question/ajax/email_invite/question_id-2847" onsubmit="return false;" id="email_invite_form">
                <input class="form-control" type="text" name="email" placeholder="邮件邀请回复..."/>
                <a class="pull-right btn btn-mini btn-success" onclick="AWS.ajax_post($('#email_invite_form'));">邀请</a>
            </form>
        </div>
    </div>
    -- end 邀请别人回复 -->


                        <!-- 相关问题 -->
                        <div class="aw-mod">
                            <div class="mod-head">
                                <h3>相关问题</h3>
                            </div>
                            <div class="mod-body font-size-12">
                                <ul>
                                    <li><a href="http://zhuangbi.me/question/2325">他姓江，总是戴着一副黑框眼镜。</a></li>
                                    <li><a href="http://zhuangbi.me/question/1576">总是用后入式，还有别的姿势吗？</a></li>
                                    <li><a href="http://zhuangbi.me/question/2165">最近总是觉得野屌膨胀，很想操</a></li>
                                    <li><a href="http://zhuangbi.me/question/495">为什么最近我总是发现一些也叫做MC石头的人？</a></li>
                                    <li><a href="http://zhuangbi.me/question/1333">我马上降落在北京天安门广场了</a></li>
                                    <li><a href="http://zhuangbi.me/question/226">为什么我的老大汪建维总是能够装逼于无形 </a></li>
                                    <li><a href="http://zhuangbi.me/question/1281">从小就家缠万贯，请告诉我怎么才能装一个穷逼。姑娘们总是迷恋我的钱，而我只想要一份普通的爱情。</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end 相关问题 -->

                        <!-- 问题状态 -->
                        <div class="aw-mod question-status">
                            <div class="mod-head">
                                <h3>问题状态</h3>
                            </div>
                            <div class="mod-body">
                                <ul>
                                    <li>最新活动: <span class="aw-text-color-blue">10 分钟前</span></li>
                                    <li>浏览: <span class="aw-text-color-blue">32</span></li>
                                    <li>关注: <span class="aw-text-color-blue">2</span> 人</li>

                                    <li class="aw-border-radius-5" id="focus_users"><a href="http://zhuangbi.me/people/%E6%A5%A0%E7%9D%BF%E4%B8%8D%E5%8F%AF%E5%BD%93"><img src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/57_avatar_mid.jpg" class="aw-user-name" data-id="46257" alt="楠睿不可当"></a> <a href="http://zhuangbi.me/people/%E8%B5%B5%E9%9B%B7"><img src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/59_avatar_mid(1).jpg" class="aw-user-name" data-id="48159" alt="赵雷"></a> </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end 问题状态 -->
                    </div>
                    <!-- end 侧边栏 -->
                </div>
            </div>
        </div>
    </div>
@section('js')

    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        });


        function formatTopic(topic){
            return "<div class='select2-result-repository clearfix'>"+
            "<div class='select2-result-repository__meta>"+
            "<div class='select2-result-repository__title>"+
            topic.name?topic.name:"laravel"+
                "</div></div></div>";
        };



        function formatTopicSelection(topic){
            return topic.name||topic.text;
        }


    </script>

@endsection



@endsection


