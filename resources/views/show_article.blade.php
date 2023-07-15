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
    </div>
    <div class="column"></div>
</div>
</body>
</html>