@extends('layouts.app')

@section('content')
    <div class="container">
        @include('UEditor::head');
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$question->title}}
                        @foreach($question->belongsToManyTopic as $topic)
                            <a class="badge pull-right" href="/topic/{{$topic->id}}">{{$topic->name}}</a>
                        @endforeach
                    </div>

                    <div class="panel-body">
                        {!! $question->body !!}
                    </div>

                    <div class="actions" style="margin-left:15px;margin-bottom:10px;">
                        @if(\Auth::check()&& \Auth::user()->owns($question))
                            <div class="form-group">
                                <span class="edit"><a class="btn btn-info pull-left" href="/questions/{{$question->id}}/edit">编辑</a></span>
                                <form action="/questions/{{$question->id}}" method="POST">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <button class="btn btn-danger" style="margin-left:10px;">删除</button>
                                </form>
                            </div>
                        @endif
                    </div>

                </div>


            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{$question->followers_count}}</h2>
                        <span>关注者</span>
                    </div>
                    <div class="panel-body question_follow">
                        <a href="/questions/{{$question->id}}/follower" class="btn btn-default {{Auth::User()->IsFollower(Auth::User()->id,$question->id)?'btn-success':''}}">
                            @if(Auth::User()->IsFollower(Auth::User()->id,$question->id))
                                已关注
                            @else
                                关注该问题
                            @endif
                        </a>
                        <a href="#editor" class="btn btn-primary">撰写答案</a>
                    </div>
                </div>
            </div>


            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$question->answers_count}} 个回复
                    </div>

                    <div class="panel-body">


                        @foreach($question->hasManyAnswer as $answer)
                            <div class="media">
                                <div class="media-left">
                                    <a href="">
                                        <img src="{{$question->belongsToUser->avatar}}" alt="{{$question->belongsToUser->name}}">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="/user/{{$answer->id}}">
                                            {{$question->belongsToUser->name}}
                                        </a>
                                        {!! $answer->body!!}
                                    </h4>
                                </div>
                            </div>
                        @endforeach


                       @if(Auth::check())

                                <form action="/questions/{{$question->id}}/answer" method='post'>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                                    <label for="">回复内容</label>


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

    <style>
        .panel-body img{
            max-width:80%;

        }
    </style>
@endsection