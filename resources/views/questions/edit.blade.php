@extends('layouts.app')

@section('content')
    <div class="container">
        @include('UEditor::head');
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">编辑问题</div>
                        {{--@foreach($errors->all() as $err)--}}
                            {{--<li>{{$err}}</li>--}}
                        {{--@endforeach--}}

                    <div class="panel-body">
                        <form action="/questions" method='post'>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="title"  >问题标题</label>
                                <input type="text" name="title" value="{{old('title')}}" id="title" placeholder="请输入标题" class="form-control {{$errors->has('title'?'has-error':'')}}">
                                @if($errors->has('title'))
                                    <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('title')}}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <select name="topics[]" class="js-example-placeholder-multiple js-data-example-ajax form-control" multiple="multiple">

                                </select>
                                
                            </div>

                            <div class="form-group {{$errors->has('body'?'has-error':'')}}" >
                                <script id="container" name="body" style="height:250px;" type="text/plain">
                                  {!! old('body') !!}
                                </script>
                            </div>
                            @if($errors->has('body'))
                                <span class="help-block">
                                        <strong style="color:red;">{{$errors->first('body')}}</strong>
                                    </span>
                            @endif
                            <button class="btn btn-success pull-right" type="submit">发布问题</button>
                        </form>

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


        $(".js-example-placeholder-multiple").select2({
           tags:true,
            placeholder:'选择相关话题',
            minimumInputLength:1,

            ajax: {
                url: "/api/topics",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term

                    };
                },
                processResults: function (data, params) {

                    return {
                        results: data
                    };
                },
                cache: true
            },


            templateResult: formatTopic, // omitted for brevity, see the source of this page
            templateSelection: formatTopicSelection // omitted for brevity, see the source of this page
        });
    </script>

    @endsection
@endsection
