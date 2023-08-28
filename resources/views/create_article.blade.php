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
    </div>
    <div class="column is-half">
        <h1>新規投稿</h1>
        <div class="box">
        @include('common.error') 
            <form method="post" action="{{route('articles.store')}}">
                @csrf
                <div class="field">
                    <label class="label">タイトル</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="タイトル" name="title" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">詳細</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="本文" name="detail" required></textarea>
                    </div>
                </div>
                カテゴリー
                <div class="select ">
                    
                <select name="category">
                    
                    <option value="1">ビジネスマナー</option>
                    <option value="2">冠婚葬祭</option>
                    <option value="3">食事</option>
                    <option value="4">乗り物</option>
                    <option value="5">その他</option>
                </select>
                </div>
                <button class="button is-link is-fullwidth mt-2">投稿</button>
            </form>
        </div>
    </div>
    <div class="column"></div>
</div>
</body>
</html>