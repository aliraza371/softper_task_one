<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/post-view.css') }}" rel="stylesheet">
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
