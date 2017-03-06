@extends('layouts.app')




@section('content')

    <div class="main layui-clear">
        <div class="wrap">
            <div class="content">
                <div class="fly-tab">
        <span>
          <a href="{{secure_url('/?order=news')}}">全部</a>
          <a href="{{secure_url('/?order=empty')}}">0回复</a>
          <a href="{{secure_url('/?order=hot')}}">热门</a>
          <a href="{{secure_url('/?order=my')}}">我的问题</a>
        </span>
                    <form action="http://cn.bing.com/search" class="fly-search ">
                        <i class="iconfont icon-sousuo"></i>
                        <input class="layui-input" autocomplete="off" placeholder="搜索内容，回车跳转" type="text" name="q">
                    </form>
                    <a href="jie/add.html" class="layui-btn jie-add">发布问题</a>
                </div>


                <ul class="fly-list">


                    @foreach($questions as $question)

                        <li class="fly-list-li">
                            <a href="user/home.html" class="fly-list-avatar">
                                <img src="{{$question['belongs_to_user']['avatar']}}" alt="{{$question['belongs_to_user']['name']}}">
                            </a>
                            <h2 class="fly-tip">
                                <a href="{{secure_url('questions/'.$question['id'])}}">{{$question['title']}}</a>
                                {{--<span class="fly-tip-stick">置顶</span>--}}
                            </h2>
                            <p>
                                <span><a href="user/home.html">{{$question['belongs_to_user']['name']}}</a></span>
                                <span>{{$question['updated_at']}}</span>

                                @foreach($question['belongs_to_many_topic'] as $topic)
                                    <span>{{ $topic['name']}}</span>
                                @endforeach


                                <span class="fly-list-hint">
              <i class="iconfont" title="回答">&#xe60c;</i> {{$question['comments_count']}}
              <i class="iconfont" title="人气">&#xe60b;</i> {{$question['browse_count']}}
            </span>
                            </p>
                        </li>
                    @endforeach



                </ul>

                <div style="text-align: center">
                    <div class="laypage-main">
                        <a href="jie/index.html" class="laypage-next">更多求解</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="edge">


            <h3 class="page-title">月度雷锋 - TOP 12</h3>
            <div class="user-looklog leifeng-rank">
      <span>
        <a href="user/home.html">
          <img src="../res/images/avatar/default.png">
          <cite>纸飞机</cite>
          <i>159次回答</i>
        </a>
        <a href="user/home.html">
          <img src="../res/images/avatar/default.png">
          <cite>纸飞机</cite>
          <i>159次回答</i>
        </a>
        <a href="user/home.html">
          <img src="../res/images/avatar/default.png">
          <cite>纸飞机</cite>
          <i>159次回答</i>
        </a>
        <a href="user/home.html">
          <img src="../res/images/avatar/default.png">
          <cite>纸飞机</cite>
          <i>159次回答</i>
        </a>

      </span>
            </div>

            <h3 class="page-title">最近热帖</h3>
            <ol class="fly-list-one">
                <li>
                    <a href="jie/detail.html">Layui 官网 在线演示页面 全面增加 查看代码 功能</a>
                    <span><i class="iconfont">&#xe60b;</i> 6087</span>
                </li>
                <li>
                    <a href="jie/detail.html">Java实现LayIM后端的核心代码</a>
                    <span><i class="iconfont">&#xe60b;</i> 767</span>
                </li>
                <li>
                    <a href="jie/detail.html">Layui 官网 在线演示页面 全面增加 查看代码 功能</a>
                    <span><i class="iconfont">&#xe60b;</i> 767</span>
                </li>
                <li>
                    <a href="jie/detail.html">Layui 官网 在线演示页面 全面增加 查看代码 功能</a>
                    <span><i class="iconfont">&#xe60b;</i> 767</span>
                </li>

            </ol>

            <h3 class="page-title">近期热议</h3>
            <ol class="fly-list-one">
                <li>
                    <a href="jie/detail.html">盛赞！大赞狂赞！Layui完美兼容Vue.js</a>
                    <span><i class="iconfont">&#xe60c;</i> 96</span>
                </li>
                <li>
                    <a href="jie/detail.html">盛赞！大赞狂赞！Layui完美兼容Vue.js</a>
                    <span><i class="iconfont">&#xe60c;</i> 96</span>
                </li>
                <li>
                    <a href="jie/detail.html">盛赞！大赞狂赞！Layui完美兼容Vue.js</a>
                    <span><i class="iconfont">&#xe60c;</i> 96</span>
                </li>

            </ol>

            <div class="fly-link">
                <span>友情链接：</span>
                <a href="http://www.layui.com/" target="_blank">Layui</a>
                <a href="http://layim.layui.com/" target="_blank">LayIM</a>
                <a href="http://layer.layui.com/" target="_blank">layer</a>
            </div>


        </div>
    </div>

@endsection


