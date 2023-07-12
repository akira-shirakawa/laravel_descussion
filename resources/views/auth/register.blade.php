<!DOCTYPE html>
<html lang="ja">
<head>
    @include('common.head')
    <title>新規登録</title>

</head>
<body>
@include('layouts.header')
<div class="columns">
    <div class="column"></div>
    <div class="column is-half">
    <div class="box">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="field">
                <label class="label">名前</label>
                <div class="control">
                    <input class="input" type="text" placeholder="名前" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
                @error('name')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label class="label">メールアドレス</label>
                <div class="control">
                    <input class="input" type="email" placeholder="メールアドレス" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
                @error('email')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label class="label">パスワード</label>
                <div class="control">
                    <input class="input" type="password" placeholder="パスワード" name="password" required autocomplete="new-password">
                </div>
                @error('password')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label class="label">パスワード（確認）</label>
                <div class="control">
                    <input class="input" type="password" placeholder="パスワード（確認）" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            性別
            <div class="select ">
                
            <select name="sex">
                
                <option value="1">男</option>
                <option value="2">女</option>
            </select>
            </div>
            年齢
            <div class="select ">
            <select name="age">
                <option value="1">25歳未満</option>
                <option value="2">25~40歳</option>
                <option value="3">41歳以上</option>
            </select>
            </div>
           
            <button class="button is-link is-fullwidth mt-2">登録</button>
                
        </form>
    </div>
    </div>
    <div class="column"></div>
</div>
</body>
</html>