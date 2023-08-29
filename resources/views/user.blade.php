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
    
        <div class="card mt-20">           
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-48x48">
                        <img src="{{asset($user->get_user_image($user->age,$user->sex))}}" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="title is-4">{{$user->name}}</p>
                        <p class="subtitle is-6">{{$user->convert_age($user->age,$user->age)}} {{$user->convert_sex($user->sex)}}</p>

                        
                        <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="button">ログアウト</button>
                        </form>
        
                    </div>
                </div>           
            </div>
        </div>

        <div class="itemWrapper mt-20">
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
                <div class="item_bottom">{{$article->created_at->diffForHumans()}} &emsp;<i class="fa-regular fa-comment"></i>{{$article->comments()->count()}} &emsp;投票数:{{$article->votes()->count()}}&emsp;
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