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
                            <user-follow-buttonsssss>2354</user-follow-buttonsssss>
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
                                        <a href="javascript:;" onclick="AWS.User.follow($(this), &#39;question&#39;, 2847);" class="follow btn btn-normal btn-success pull-left "><span>关注</span> <em>|</em> <b>2</b></a>
                                        <!-- 下拉菜单 -->
                                        <div class="btn-group pull-left">
                                            <a class="btn btn-gray dropdown-toggle" data-toggle="dropdown" href="javascript:;">...</a>
                                            <div class="aw-dropdown pull-right" role="menu" aria-labelledby="dropdownMenu">
                                                <ul class="aw-dropdown-list">
                                                    <li>
                                                        <a href="http://zhuangbi.me/question/2847?column=log&amp;rf=false" rel="nofollow">修改记录</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
                                <!-- 站内邀请 -->
                                <div class="aw-invite-box hide">
                                    <div class="mod-head clearfix">
                                        <div class="search-box pull-left">
                                            <input id="invite-input" class="form-control" type="text" placeholder="搜索你想邀请的人...">
                                            <div class="aw-dropdown">
                                                <p class="title">没有找到相关结果</p>
                                                <ul class="aw-dropdown-list"></ul>
                                            </div>
                                            <i class="icon icon-search"></i>
                                        </div>
                                        <div class="invite-list pull-left hide">
                                            已邀请:
                                        </div>
                                    </div>
                                    <div class="mod-body clearfix">
                                        <ul>
                                            <li style="display: list-item;">
                                                <a class="aw-user-img pull-left" data-id="43705" href="http://zhuangbi.me/people/%E8%83%9C%E5%93%A5"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/05_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="胜哥" data-id="43705" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="43705" href="http://zhuangbi.me/people/%E8%83%9C%E5%93%A5">胜哥</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 24 个赞同												</p>
                                                </div>
                                            </li>
                                            <li style="display: list-item;">
                                                <a class="aw-user-img pull-left" data-id="41307" href="http://zhuangbi.me/people/8yeye"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/07_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="剿匪总司令部" data-id="41307" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="41307" href="http://zhuangbi.me/people/8yeye">剿匪总司令部</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 24 个赞同												</p>
                                                </div>
                                            </li>
                                            <li style="display: list-item;">
                                                <a class="aw-user-img pull-left" data-id="14330" href="http://zhuangbi.me/people/jiefu"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/30_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="姐夫" data-id="14330" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="14330" href="http://zhuangbi.me/people/jiefu">姐夫</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 14 个赞同												</p>
                                                </div>
                                            </li>
                                            <li style="display: list-item;">
                                                <a class="aw-user-img pull-left" data-id="43315" href="http://zhuangbi.me/people/%E5%B8%85%E6%B0%94%E7%9A%84%E6%8A%BD%E5%B1%89"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/15_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="帅气的抽屉" data-id="43315" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="43315" href="http://zhuangbi.me/people/%E5%B8%85%E6%B0%94%E7%9A%84%E6%8A%BD%E5%B1%89">帅气的抽屉</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 12 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="43960" href="http://zhuangbi.me/people/%E4%B8%BA%E5%AE%B6%E5%AE%B6%E8%A3%85%E6%B0%B4%E6%9A%96"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/avatar-mid-img.png"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="为家家装水暖" data-id="43960" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="43960" href="http://zhuangbi.me/people/%E4%B8%BA%E5%AE%B6%E5%AE%B6%E8%A3%85%E6%B0%B4%E6%9A%96">为家家装水暖</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 10 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="34461" href="http://zhuangbi.me/people/25856"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/61_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="25856" data-id="34461" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="34461" href="http://zhuangbi.me/people/25856">25856</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 10 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="43959" href="http://zhuangbi.me/people/Skyfall"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/59_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="Skyfall" data-id="43959" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="43959" href="http://zhuangbi.me/people/Skyfall">Skyfall</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 9 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="36427" href="http://zhuangbi.me/people/%E8%87%B4%E8%BF%9C"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/avatar-mid-img.png"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="致远" data-id="36427" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="36427" href="http://zhuangbi.me/people/%E8%87%B4%E8%BF%9C">致远</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 7 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="32891" href="http://zhuangbi.me/people/%E5%8C%97%E9%A9%AC%E9%87%8C%E4%BA%9A%E7%BA%B3"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/91_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="北马里亚纳" data-id="32891" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="32891" href="http://zhuangbi.me/people/%E5%8C%97%E9%A9%AC%E9%87%8C%E4%BA%9A%E7%BA%B3">北马里亚纳</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 8 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="43126" href="http://zhuangbi.me/people/%E7%88%B1%E4%B8%BD%E4%B8%9D%E7%9A%84%E7%8B%97"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/26_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="爱丽丝的狗" data-id="43126" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="43126" href="http://zhuangbi.me/people/%E7%88%B1%E4%B8%BD%E4%B8%9D%E7%9A%84%E7%8B%97">爱丽丝的狗</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 6 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="32785" href="http://zhuangbi.me/people/too%E7%BE%8A"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/85_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="too羊" data-id="32785" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="32785" href="http://zhuangbi.me/people/too%E7%BE%8A">too羊</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 6 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="28488" href="http://zhuangbi.me/people/%E4%B8%8A%E8%88%B0%E7%8B%82%E9%AD%94%E5%BC%A0%E5%8F%AC%E5%BF%A0"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/88_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="上舰狂魔张召忠" data-id="28488" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="28488" href="http://zhuangbi.me/people/%E4%B8%8A%E8%88%B0%E7%8B%82%E9%AD%94%E5%BC%A0%E5%8F%AC%E5%BF%A0">上舰狂魔张召忠</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 5 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="32881" href="http://zhuangbi.me/people/mswj"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/81_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="360安全卫士" data-id="32881" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="32881" href="http://zhuangbi.me/people/mswj">360安全卫士</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 5 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="41688" href="http://zhuangbi.me/people/yangshu"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/88_avatar_mid(1).jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="杨永信-杨叔" data-id="41688" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="41688" href="http://zhuangbi.me/people/yangshu">杨永信-杨叔</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 5 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="13791" href="http://zhuangbi.me/people/liuyunshan"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/91_avatar_mid(1).jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="刘云山" data-id="13791" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="13791" href="http://zhuangbi.me/people/liuyunshan">刘云山</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 5 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="36425" href="http://zhuangbi.me/people/%E5%BE%A1%E5%9D%8219009"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/25_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="御坂19009" data-id="36425" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="36425" href="http://zhuangbi.me/people/%E5%BE%A1%E5%9D%8219009">御坂19009</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 4 个赞同												</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="aw-user-img pull-left" data-id="36406" href="http://zhuangbi.me/people/%E7%A5%9E%E5%BA%A7%E5%87%BA%E6%B5%81"><img class="img" alt="" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/06_avatar_mid.jpg"></a>
                                                <div class="main">
                                                    <a class="pull-right btn btn-mini btn-success" data-value="神座出流" data-id="36406" onclick="AWS.User.invite_user($(this),$(this).parents(&#39;li&#39;).find(&#39;img&#39;).attr(&#39;src&#39;));">邀请</a>

                                                    <a class="aw-user-name" data-id="36406" href="http://zhuangbi.me/people/%E7%A5%9E%E5%BA%A7%E5%87%BA%E6%B5%81">神座出流</a>

                                                    <p>

                                                        在 <span class="topic-tag"><a class="text" data-id="钓鱼" href="http://zhuangbi.me/topic/1151">钓鱼</a></span> 话题下 获得 4 个赞同												</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mod-footer">
                                        <a class="next pull-right">&gt;</a> <a class="prev active pull-right">&lt;</a>
                                    </div>
                                </div>
                                <!-- end 站内邀请 -->
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


                                    <h2 class="hidden-xs">2 个回复</h2>
                                </ul>
                            </div>
                            <div class="mod-body aw-feed-list">
                                <div class="aw-item" uninterested_count="0" force_fold="0" id="answer_list_20537">
                                    <div class="mod-head">
                                        <a class="anchor" name="answer_20537"></a>
                                        <!-- 用户头像 -->
                                        <a class="aw-user-img aw-border-radius-5" href="http://zhuangbi.me/people/%E6%A5%A0%E7%9D%BF%E4%B8%8D%E5%8F%AF%E5%BD%93" data-id="46257"><img src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/57_avatar_mid.jpg" alt=""></a>										<!-- end 用户头像 -->
                                        <div class="title">
                                            <p>
                                                <a class="aw-user-name" href="http://zhuangbi.me/people/%E6%A5%A0%E7%9D%BF%E4%B8%8D%E5%8F%AF%E5%BD%93" data-id="46257">楠睿不可当</a>
                                            </p>
                                            <p class="text-color-999 aw-agree-by hide">
                                                赞同来自:

                                            </p>
                                        </div>
                                    </div>
                                    <div class="mod-body clearfix">
                                        <!-- 评论内容 -->
                                        <div class="markitup-box">
                                            地球为什么在脚下？										</div>


                                        <!-- end 评论内容 -->
                                    </div>
                                    <div class="mod-footer">
                                        <!-- 社交操作 -->
                                        <div class="meta clearfix">
                                            <span class="text-color-999 pull-right">22 小时前</span>
                                            <!-- 投票栏 -->
                                            <span class="operate">
												<a class="agree  " onclick="AWS.User.agree_vote(this, &#39;一个萝卜一个我&#39;, 20537);"><i data-placement="right" title="" data-toggle="tooltip" class="icon icon-agree" data-original-title="赞同回复"></i> <b class="count">0</b></a>
																								<a class="disagree " onclick="AWS.User.disagree_vote(this, &#39;一个萝卜一个我&#39;, 20537)"><i data-placement="right" title="" data-toggle="tooltip" class="icon icon-disagree" data-original-title="对回复持反对意见"></i></a>
																							</span>
                                            <!-- end 投票栏 -->
                                            <span class="operate">
												<a class="aw-add-comment" data-id="20537" data-type="answer" data-comment-count="0" data-first-click="hide" href="javascript:;"><i class="icon icon-comment"></i> 0</a>
											</span>
                                            <!-- 可显示/隐藏的操作box -->
                                            <div class="more-operate">
                                                <a class="aw-icon-thank-tips text-color-999" data-original-title="这是一个没有价值的回复" data-toggle="tooltip" title="" data-placement="bottom" onclick="AWS.User.answer_user_rate($(this), &#39;uninterested&#39;, 20537);"><i class="icon icon-fold"></i>没有帮助</a>

                                                <a href="javascript:;" onclick="AWS.dialog(&#39;favorite&#39;, {item_id:20537, item_type:&#39;answer&#39;});" class="text-color-999"><i class="icon icon-favor"></i> 收藏</a>

                                                <a href="javascript:;" onclick="AWS.User.answer_user_rate($(this), &#39;thanks&#39;, 20537);" class="aw-icon-thank-tips text-color-999" data-original-title="感谢热心的回复者" data-toggle="tooltip" title="" data-placement="bottom"><i class="icon icon-thank"></i> 感谢</a>
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
                                <div class="aw-item" uninterested_count="0" force_fold="0" id="answer_list_20540">
                                    <div class="mod-head">
                                        <a class="anchor" name="answer_20540"></a>
                                        <!-- 用户头像 -->
                                        <a class="aw-user-img aw-border-radius-5" href="http://zhuangbi.me/people/%E8%B5%B5%E9%9B%B7" data-id="48159"><img src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/59_avatar_mid(1).jpg" alt=""></a>										<!-- end 用户头像 -->
                                        <div class="title">
                                            <p>
                                                <a class="aw-user-name" href="http://zhuangbi.me/people/%E8%B5%B5%E9%9B%B7" data-id="48159">赵雷</a>
                                                - <span class="text-color-999 user_info" title="我把手插进裤兜">我把手插进裤兜</span>																																			</p>
                                            <p class="text-color-999 aw-agree-by hide">
                                                赞同来自:

                                            </p>
                                        </div>
                                    </div>
                                    <div class="mod-body clearfix">
                                        <!-- 评论内容 -->
                                        <div class="markitup-box">
                                            这个简单啊，因为陨石有“择坑效应”。<br>
                                            &nbsp;<br>
                                            你想，突然掉了下来，又那么圆，所以一定会滚来滚去，最后如果有个坑，就滚进去了。<br>
                                            &nbsp;<br>
                                            有同学就问了，如果附近没有坑怎么办，根本不用担心好不好好不好，它会一直滚来滚去，并利用相关算法，直到找到找到坑为止，否则按照牛顿第一定律，它是不会停下来的。										</div>


                                        <!-- end 评论内容 -->
                                    </div>
                                    <div class="mod-footer">
                                        <!-- 社交操作 -->
                                        <div class="meta clearfix">
                                            <span class="text-color-999 pull-right">10 分钟前</span>
                                            <!-- 投票栏 -->
                                            <span class="operate">
												<a class="agree  " onclick="AWS.User.agree_vote(this, &#39;一个萝卜一个我&#39;, 20540);"><i data-placement="right" title="" data-toggle="tooltip" class="icon icon-agree" data-original-title="赞同回复"></i> <b class="count">0</b></a>
																								<a class="disagree " onclick="AWS.User.disagree_vote(this, &#39;一个萝卜一个我&#39;, 20540)"><i data-placement="right" title="" data-toggle="tooltip" class="icon icon-disagree" data-original-title="对回复持反对意见"></i></a>
																							</span>
                                            <!-- end 投票栏 -->
                                            <span class="operate">
												<a class="aw-add-comment" data-id="20540" data-type="answer" data-comment-count="0" data-first-click="hide" href="javascript:;"><i class="icon icon-comment"></i> 0</a>
											</span>
                                            <!-- 可显示/隐藏的操作box -->
                                            <div class="more-operate">
                                                <a class="aw-icon-thank-tips text-color-999" data-original-title="这是一个没有价值的回复" data-toggle="tooltip" title="" data-placement="bottom" onclick="AWS.User.answer_user_rate($(this), &#39;uninterested&#39;, 20540);"><i class="icon icon-fold"></i>没有帮助</a>

                                                <a href="javascript:;" onclick="AWS.dialog(&#39;favorite&#39;, {item_id:20540, item_type:&#39;answer&#39;});" class="text-color-999"><i class="icon icon-favor"></i> 收藏</a>

                                                <a href="javascript:;" onclick="AWS.User.answer_user_rate($(this), &#39;thanks&#39;, 20540);" class="aw-icon-thank-tips text-color-999" data-original-title="感谢热心的回复者" data-toggle="tooltip" title="" data-placement="bottom"><i class="icon icon-thank"></i> 感谢</a>
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
                            <form action="http://zhuangbi.me/question/ajax/save_answer/" onsubmit="return false;" method="post" id="answer_form" class="question_answer_form">
                                <input type="hidden" name="post_hash" value="641442250196830F">
                                <input type="hidden" name="question_id" value="2847">
                                <input type="hidden" name="attach_access_key" value="7ea2b25c96d245fe54807f46cc43eb54">
                                <div class="mod-head">
                                    <a href="http://zhuangbi.me/people/" class="aw-user-name"><img alt="一个萝卜一个我" src="./陨石为什么总是落在陨石坑里_ - 逼乎_files/47_avatar_mid.jpg"></a>
                                    <p>
                                        <label class="pull-right">
                                            <input type="checkbox" value="1" name="anonymous"> 匿名回复								</label>
                                        <label class="pull-right">
                                            <input type="checkbox" checked="checked" value="1" name="auto_focus"> 关注问题								</label>
                                        <label class="pull-right">
                                            <a href="http://zhuangbi.me/integral/rule/" target="_blank">逼格规则</a>								</label>
                                        一个萝卜一个我							</p>
                                </div>
                                <div id="answerNotify" class="answerNotify">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <p class="h4 mt0">你正在撰写回复</p>
                                    <p>如果你是要对问题或其他回答进行点评或询问，请使用“评论”功能。</p>
                                    <p>发布的内容中不得包含其他用户的个人信息。包括实际地址、邮箱地址、电话号码及不当的照片和/或视频。</p>
                                    <p>不得包含骚扰或歧视性用语。</p>
                                    <p>点击<a href="http://zhuangbi.me/page/terms" target="_blank" class="legal">此处</a>显示逼乎协议。</p>
                                </div>
                                <div class="mod-body">
                                    <div class="aw-mod aw-editor-box">
                                        <div class="mod-head">
                                            <div class="wmd-panel">


                                                <form action="/questions/{{$question->id}}/answer" method='post'>
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                                                    <label for="">回复内容</label>
                                                    <question-follow-buttons></question-follow-buttons>

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

                                                </form>


                                            </div>
                                        </div>
                                        <div class="mod-body clearfix">
                                            <a href="javascript:;" onclick="AWS.ajax_post($(&#39;#answer_form&#39;), AWS.ajax_processer, &#39;reply_question&#39;);" class="btn btn-normal btn-success pull-right btn-reply">回复</a>
                                            <span class="pull-right text-color-999" id="answer_content_message">&nbsp;</span>
                                            <div class="aw-upload-box">
                                                <a class="btn btn-default"><form method="post" enctype="multipart/form-data" id="upload-form" action="http://zhuangbi.me/publish/ajax/attach_upload/id-answer__attach_access_key-7ea2b25c96d245fe54807f46cc43eb54" target="ajaxUpload"><input type="submit" class="submit"><input type="file" class="file-input" name="aws_upload_file" multiple="multiple"></form>上传附件</a>
                                                <div class="upload-container"><ul class="upload-list"></ul></div>
                                                <span class="text-color-999 aw-upload-tips hidden-xs">允许 : jpg,jpeg,png,gif</span>
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
                                        <a class="icon-inverse follow tooltips icon icon-plus " onclick="AWS.User.follow($(this), &#39;user&#39;, 31038);" data-original-title="关注">关注</a>

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


