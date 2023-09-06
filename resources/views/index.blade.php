<!DOCTYPE html>
<html lang="ja">
<head>
    @include('common.head')
    <title>マナーsalon</title>

</head>
<body>
@include('layouts.header')
<div class="bl_jumbotron" style="background-image: url({{asset('hero.jpeg')}});">
    <div class="bl_jumbotron_inner">
        <p class="bl_jumbotron_ttl">
        みんなで
        <br class="lg_only">
        マナーについて話し合う
        </p>
    </div>
</div>
<div class="columns">
    <div class="column">
        
    </div>
    <div class="column is-half">
    <div class="itemWrapper mt-20 mb-20">
        <h2 class="Wrapperhead">
            投票数ランキング
        </h2>
        @foreach($articles_famous as $article)
        <a class="item" href="{{route('articles.show',['article'=>$article])}}">
            <div class="item_left">
               
                <img src="{{asset('category_images/category_'.$article->category.'.png')}}" alt="" width="60px" height="60px">
            </div>
            <div class="item_right">
            <div class="item_title">{{$article->restrict_word($article->title)}}</div>
            <div class="item_bottom">{{$article->created_at->diffForHumans()}} &emsp;<i class="fa-regular fa-comment"></i>{{$article->comments->count()}} &emsp;投票数:{{$article->votes()->count()}}</div>
            </div>
        </a>
        @endforeach
        {{$articles_famous->links()}}
    </div>

    <div class="itemWrapper mt-20 mb-20">
        <h2 class="Wrapperhead">
            新着
        </h2>
        @foreach($articles as $article)
        <a class="item" href="{{route('articles.show',['article'=>$article])}}">
            <div class="item_left">
               
                <img src="{{asset('category_images/category_'.$article->category.'.png')}}" alt="" width="60px" height="60px">
            </div>
            <div class="item_right">
            <div class="item_title">{{$article->restrict_word($article->title)}}</div>
            <div class="item_bottom">{{$article->created_at->diffForHumans()}} &emsp;<i class="fa-regular fa-comment"></i>{{$article->comments->count()}} &emsp;投票数:{{$article->votes()->count()}}</div>
            </div>
        </a>
        @endforeach
        {{$articles->links()}}
    </div>
    </div>
    <div class="column">
        <div class="category mt-20">
            <div class="category_head">カテゴリー</div>
                    <a href="{{ route('category', ['id' => 1]) }}">ビジネスマナー</a>
                    <a href="{{ route('category', ['id' => 2]) }}">冠婚葬祭</a>
                    <a href="{{ route('category', ['id' => 3]) }}">食事</a>
                    <a href="{{ route('category', ['id' => 4]) }}">乗り物</a>
                    <a href="{{ route('category', ['id' => 5]) }}">その他</a>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="footer_inner">
        akira's portfolio
    </div>
</div>

</body>
</html>