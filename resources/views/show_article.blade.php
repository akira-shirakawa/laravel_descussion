<!DOCTYPE html>
<html lang="ja">
<head>
    @include('common.head')
    <title>Document</title>

</head>
<body>
@include('layouts.header')
<div class="columns" id="app">
    <div class="column">
    </div>
    <div class="column is-half">
        <h2>題名</h2>
        <div class="articleTitle">
            <div class="articleTitle_head box"><h2>{{$article->title}}<h2></div>
            <div class="articleTitle_bottom">

            </div>
        </div>
        <h2>詳細</h2>
        <div class="box">
            {{$article->detail}}
        </div>
        
        <vote
        endpoint = "{{ route('vote') }}"
        endpoint_has_my_vote = "{{ route('hasMyVote',['article'=>$article]) }}"
        endpoint_get_vote = "{{ route('getVote',['article'=>$article]) }}"
        :user = '@json(Auth::user())'
        :article_id = '@json($article->id)'
        :authorized='@json(Auth::check())'>
        </vote>
        <h2>コメント</h2>
        @auth
        <form action="{{route('comments.store')}}" method="post">
            @csrf
            <textarea class="textarea" name="comment" placeholder="素敵なコメントを書く"></textarea>
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <input type="submit" class="button is-link is-fullwidth mt-2" value="コメントする">
        </form>
        @endauth
        @guest
        <div class="un_login_box">コメントをするには<a href="{{ route('register') }}">ログイン</a>してください</div>
        @endguest
        @foreach($comments as $comment)
            <div class="comment">
            <div class="comment_left">
                <img src="{{asset($comment->get_user_image($comment->user->age,$comment->user->sex))}}" alt="" width="90%">
            </div>
            <div class="comment_right">
                <div class="comment_head">{{$comment->convert_age($comment->user->age)}}{{$comment->convert_sex($comment->user->sex)}} | {{$comment->created_at->diffForHumans()}}</div>
                <div class="comment_body">{{$comment->comment}}</div>
                <div class="comment_bottom">
                    <like
                    :authorized='@json(Auth::check())'
                    :get_like='@json($comment->get_like())'
                    :is_liked='@json($comment->is_liked())'
                    :comment_id='@json($comment->id)'
                    
                    endpoint="{{route('like')}}">
                </like>
                </div>
            </div>
        </div>
        @endforeach
       {{$comments->links()}}
        <div class="itemWrapper mt-20">
        <h2 class="Wrapperhead">
            関連
        </h2>
        @foreach($category_ranking as $article)
        <a class="item" href="{{route('articles.show',['article'=>$article])}}">
            <div class="item_left">
               
                <img src="{{asset('category_images/category_'.$article->category.'.png')}}" alt="" width="60px" height="60px">
            </div>
            <div class="item_right">
            <div class="item_title">{{$article->title}}</div>
            <div class="item_bottom">{{$article->created_at->diffForHumans()}} &emsp;<i class="fa-regular fa-comment"></i>{{$article->comments->count()}} &emsp;投票数:{{$article->votes()->count()}}</div>
            </div>
        </a>
        @endforeach
    </div>
     
    </div>
    <div class="column"></div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>