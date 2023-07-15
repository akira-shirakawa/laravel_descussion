<!DOCTYPE html>
<html lang="ja">
<head>
    @include('common.head')
    <title>Document</title>

</head>
<body>
@include('layouts.header')
<div class="columns">
    <div class="column">
        @auth
        hoge
        @endauth
    </div>
    <div class="column is-half">
        @auth
        <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">ログアウト</button>
        </form>
        @endauth
    <div class="itemWrapper">
        <h2 class="Wrapperhead">
            新着
        </h2>
        @foreach($articles as $article)
        <a class="item" href="{{route('articles.show',['article'=>$article])}}">
            <div class="item_left">
               
                <img src="{{asset('category_images/category_'.$article->category.'.png')}}" alt="" width="60px" height="60px">
            </div>
            <div class="item_right">
            <div class="item_title">{{$article->title}}</div>
            <div class="item_botton"></div>
            </div>
        </a>
        @endforeach
    </div>
    </div>
    <div class="column"></div>
</div>
</body>
</html>