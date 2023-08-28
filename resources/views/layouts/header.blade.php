<div class="header">
    <div class="header_innner">
        <div class="header_left">
            @auth
            <a href="{{route('articles.create')}}">投稿する<i class="fa-solid fa-pen"></i></a>
            @endauth
        </div>
        <div class="header_center"><a href="/">マナーsalon</a></div>
        <div class="header_right">
            @auth
            <a href="{{route('user',['user'=>auth::user()])}}"><i class="fa-solid fa-user"></i></a>
            @endauth
        </div>
    </div>
</div>