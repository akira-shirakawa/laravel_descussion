<!DOCTYPE html>
<html lang="ja">
<head>
    @include('common.head')
    <title>マナーsalon</title>

</head>
<body>
@include('layouts.header')
<div class="columns">
    <div class="column">
        
    </div>
    <div class="column is-half">
    
        <div class="itemWrapper">
            <h2 class="Wrapperhead">
                自分の投稿
            </h2>
            @foreach($articles as $article)
            <a class="item" href="{{route('articles.show',['article'=>$article])}}">
                <div class="item_left">
                
                    <img src="{{asset('category_images/category_'.$article->category.'.png')}}" alt="" width="60px" height="60px">
                </div>
                <div class="item_right">
                <div class="item_title">{{$article->title}}</div>
                <div class="item_bottom">{{$article->created_at->diffForHumans()}} &emsp;<i class="fa-regular fa-comment"></i>{{$article->comments->count()}} &emsp;投票数:{{$article->votes()->count()}}&emsp;
                <form action="{{route('articles.destroy',['article'=>$article])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">削除</button>
                </div>
                </div>
            </a>
            @endforeach
        </div>
   
    </div>
    <div class="column">
        
    </div>
</div>
<div class="footer">
    <div class="footer_inner">
        akira's portfolio
    </div>
</div>
</body>
</html>