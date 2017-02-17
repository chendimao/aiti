@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
        </div>
    </div>

    <style>
        .panel-body img{
            max-width:80%;

        }
    </style>
@endsection
