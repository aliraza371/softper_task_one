<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        body{
            margin-top:20px;
            background:#ebeef0;
        }

        .img-sm {
            width: 46px;
            height: 46px;
        }

        .panel {
            box-shadow: 0 2px 0 rgba(0,0,0,0.075);
            border-radius: 0;
            border: 0;
            margin-bottom: 15px;
        }

        .panel .panel-footer, .panel>:last-child {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .panel .panel-heading, .panel>:first-child {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .panel-body {
            padding: 25px 20px;
        }


        .media-block .media-left {
            display: block;
            float: left
        }

        .media-block .media-right {
            float: right
        }

        .media-block .media-body {
            display: block;
            overflow: hidden;
            width: auto
        }

        .middle .media-left,
        .middle .media-right,
        .middle .media-body {
            vertical-align: middle
        }

        .thumbnail {
            border-radius: 0;
            border-color: #e9e9e9
        }

        .tag.tag-sm, .btn-group-sm>.tag {
            padding: 5px 10px;
        }

        .tag:not(.label) {
            background-color: #fff;
            padding: 6px 12px;
            border-radius: 2px;
            border: 1px solid #cdd6e1;
            font-size: 12px;
            line-height: 1.42857;
            vertical-align: middle;
            -webkit-transition: all .15s;
            transition: all .15s;
        }
        .text-muted, a.text-muted:hover, a.text-muted:focus {
            color: #acacac;
        }
        .text-sm {
            font-size: 0.9em;
        }
        .text-5x, .text-4x, .text-5x, .text-2x, .text-lg, .text-sm, .text-xs {
            line-height: 1.25;
        }

        .btn-trans {
            background-color: transparent;
            border-color: transparent;
            color: #929292;
        }

        .btn-icon {
            padding-left: 9px;
            padding-right: 9px;
        }

        .btn-sm, .btn-group-sm>.btn, .btn-icon.btn-sm {
            padding: 5px 10px !important;
        }

        .mar-top {
            margin-top: 15px;
        }
    </style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Posts</title>
</head>
<body>
<div class="container bootdey">
    <div class="col-md-12 bootstrap snippets">
        <div class="panel">
            <div class="panel-body">
                <form action="{{route('create-post')}}" method="post">
                    @csrf
                <textarea class="form-control" required name="post" rows="2" placeholder="What are you thinking?"></textarea>
                <div class="mar-top clearfix">
                    <button class="btn btn-sm btn-primary float-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>
                </div>
                </form>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body">


                @if(isset($posts))
                    @foreach($posts as $post)
                <div class="media-block">
                    <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
                    <div class="media-body">

                                <p class="pl-2">{{$post['post']}}</p>
                        <hr>

                                @if(isset($post['comments']))
                                    @if(!empty($post['comments']))
                                        @foreach($post['comments'] as $comment)
                        <!-- Comments -->
                        <div>
                            <div class="media-block">
                                <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar2.png"></a>
                                <div class="media-body">
                                    <span class="pl-2">{{$comment['comment']}}</span>
                                    <hr>
                                </div>
                            </div>
            </div>
                            @endforeach
                        @endif
                        @endif
                        <div>
                            <form action="{{route('get-comments',[$post['id']])}}" method="post">
                                @csrf
                                <textarea class="form-control" name="comment" required rows="2" placeholder="What are you thinking?"></textarea>
                                <div class="mar-top clearfix">
                                    <button class="btn btn-sm btn-primary float-right" type="submit"><i class="fa fa-pencil fa-fw"></i>Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

</div>
        </div>
    </div>
</div>
</body>
