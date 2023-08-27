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
        @auth
        hoge
        @endauth
    </div>
    <div class="column is-half">
        <h2>題名</h2>
        <div class="articleTitle">
            <div class="articleTitle_head">{{$article->title}}</div>
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
        
       
    
    </div>
    <div class="column"></div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>