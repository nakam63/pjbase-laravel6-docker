<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ユーザーログイン</title>
    <link type="text/css" rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h2>ユーザーログイン</h2>

    <!-- show error message.-->
    @if ($errors->any())
        <ul class="error-box">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST">
        @csrf
        <ul>
            <li>
                <label>メールアドレス</label>
                <input type="text" name="email" value="{{ old('email') }}">
            </li>
            <li>
                <label>パスワード</label>
                <input type="password" name="password">
            </li>
        </ul>
        <input type="submit" value="ログイン">
    </form>

</body>
</html>
