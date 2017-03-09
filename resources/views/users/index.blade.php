@extends('layouts.app')

@section('content')

    <div class="fly-home" style="background-image: url();">
        <img src="{{$user->avatar}}" alt="{{$user->name}}">
        <h1>{{$user->name}}
            <i class="iconfont icon-nan"></i>
            <!-- <i class="iconfont icon-nv"></i> -->

            <!-- <span style="color:#c00;">（超级码农）</span>
            <span style="color:#5FB878;">（活雷锋）</span>
            <span>（该号已被封）</span> -->
        </h1>
        <div class="layui-main">
            <p style="display: inline-block; max-width: 800px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #999; margin-top: 10px;">
                @if($user->summary!=null)
                    {{$user->summary}}
                @else
                    这个人懒得留下签名
                @endif

            </p>
        </div>
        <!--<div class="fly-sns">
          <span lay-event="">添加好友</span>
        </div>-->
    </div>

    <div class="main layui-clear">
        <div class="fly-main layui-clear">

            <div class="home-nav">
                <a href="">主页</a>
                <!--<a href="">求解</a>-->
            </div>
            <div class="home-left">
                <h2>最近发表的求解</h2>
                <ul class="jie-row">

                   @foreach($user->hasManyQuestion as $user_question)
                        <li>
                        {{--<span class="fly-jing">精</span>--}}
                        {{--<span class="jie-status jie-status-ok">已解决</span>--}}
                        <!-- <span class="jie-status">求解中</span> -->
                            <a href="{{url('questions/'.$user_question->id)}}">{{$user_question->title}}</a>
                            <i>{{$user_question->updated_at}}</i>
                            <em>{{$user_question->browse_count}}阅/{{$user_question->answers_count}}答</em>
                        </li>
                @endforeach
                    <!-- <li class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><i style="font-size:14px;">没有发表任何求解</i></li> -->
                </ul>

                <h2 style="margin-top:30px;">最近的回答</h2>
                <ul class="home-jieda">


                    @foreach($user->belongsToManyAnswer as $key=>$answer)
                        <li>
                            <p>
                                <span>{{$answer->created_at}}</span>
                                在<a href="{{url('questions/'.$question[$key]->id)}}" target="_blank">
                                    @if($answer->question_id==$question[$key]->id)
                                        {{$question[$key]->title}}
                                    @endif
                                </a>中回答：
                            </p>
                            <div class="home-dacontent">
                                {!! $answer->body !!}
                            </div>
                        </li>
                    @endforeach

                    <!-- <li class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>没有回答任何问题</span></li> -->
                </ul>
            </div>
            <div class="home-right">
                <ul class="home-info">
                    <li><i class="iconfont icon-zuichun"></i>拥有飞吻：<span style="color: #FF7200;">5200</span></li>
                    <li><i class="iconfont icon-shijian"></i>加入时间：<span>{{$user->created_at}}</span></li>
                    <li><i class="iconfont icon-chengshi"></i>城市：<span>杭州</span></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
