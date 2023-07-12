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
        <form method="POST" action="{{ route('login') }}">
            @csrf
           
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
           
           
            <button class="button is-link is-fullwidth mt-2">登録</button>
                
        </form>
    </div>
    </div>
    <div class="column"></div>
</div>
</body>
</html>