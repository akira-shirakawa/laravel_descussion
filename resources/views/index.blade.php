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
    <div class="column">
        @auth
        <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">ログアウト</button>
        </form>
        @endauth
    <section class="section is-large">
    <h1 class="title">Large section</h1>
    <h2 class="subtitle">
        A simple container to divide your page into <strong>sections</strong>, like the one you're currently reading.
    </h2>
    </section>
    </div>
    <div class="column"></div>
</div>
</body>
</html>