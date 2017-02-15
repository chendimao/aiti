@extends('layouts.app')

@section('content')
    <div class="container">
        @include('UEditor::head');
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">发布问题</div>
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



    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        });
    </script>

@endsection
