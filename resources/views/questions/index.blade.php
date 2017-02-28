@extends('layouts.app')

@section('content')

    <div class="col-sm-12 col-md-9 aw-main-content" style="background-color: rgba(255, 255, 255, 0);">
        <!-- 新消息通知 -->
        <div class="aw-mod aw-notification-box hide" id="index_notification">
            <div class="mod-head common-head">
                <h2>
                    <span class="pull-right"><a href="http://zhuangbi.me/account/setting/privacy/#notifications" class="text-color-999"><i class="icon icon-setting"></i> 通知设置</a></span>
                    <i class="icon icon-bell"></i>新通知<em class="badge badge-important" name="notification_unread_num">0</em>
                </h2>
            </div>
            <div class="mod-body">
                <ul id="notification_list"></ul>
            </div>
            <div class="mod-footer clearfix">
                <a href="javascript:;" onclick="AWS.Message.read_notification(false, 0, false);" class="pull-left btn btn-mini btn-gray">我知道了</a>
                <a href="http://zhuangbi.me/notifications/" class="pull-right btn btn-mini btn-success">查看所有</a>
            </div>
        </div>
        <!-- end 新消息通知 -->
        <!-- tab切换 -->
        <ul class="nav nav-tabs aw-nav-tabs active hidden-xs">
            <li class="active"><a href="http://zhuangbi.me/">最新</a></li>
            <li><a href="http://zhuangbi.me/is_recommend-1">推荐</a></li>
            <li><a href="http://zhuangbi.me/sort_type-hot__day-7" id="sort_control_hot">热门</a></li>
            <li><a href="http://zhuangbi.me/sort_type-unresponsive">等待回复</a></li>
        </ul>
        <!-- end tab切换 -->


        <div class="aw-mod aw-explore-list">
            <div class="mod-body">
                <div class="aw-common-list">

                    @foreach($questions as $question)



                    <div class="aw-item " data-topic-id="1792,">
                        <a class="aw-user-name hidden-xs" data-id="44767" href="http://zhuangbi.me/people/%E7%99%BD%E7%BE%8A" rel="nofollow"><img src="{{$question->belongsToUser->avatar}}" alt=""></a>	<div class="aw-question-content">
                            <h4>
                                <a href="{{url('questions/'.$question->id)}}">{{$question->title}}</a>
                            </h4>

                            <p>
                                <a href="" class="aw-user-name" data-id="36098"><!--<img class="img" style="height: 16px;width: 16px;border-radius: 50%;margin: -3px 3px 0 0;" src="./发现 - 逼乎_files/avatar-min-img.png" alt=""></a> -->				<!--<span class="text-color-999">回复了问题 • -->{{$question->followers_count}} 人关注 • {{$question->answers_count}} 个回复 • 62 次浏览 • 3 小时前				</span>
                                <span class="text-color-999 related-topic hide"> •  来自相关话题</span>
                            </p>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
            <div class="mod-footer">
                <div class="page-control"><ul class="pagination pull-right"><li class="active"><a href="javascript:;">1</a></li><li><a href="http://zhuangbi.me/sort_type-new__day-0__is_recommend-0__page-2">2</a></li><li><a href="http://zhuangbi.me/sort_type-new__day-0__is_recommend-0__page-3">3</a></li><li><a href="http://zhuangbi.me/sort_type-new__day-0__is_recommend-0__page-4">4</a></li><li><a href="http://zhuangbi.me/sort_type-new__day-0__is_recommend-0__page-2">&gt;</a></li><li><a href="http://zhuangbi.me/sort_type-new__day-0__is_recommend-0__page-141">&gt;&gt;</a></li></ul></div>						</div>
        </div>
    </div>


@endsection
