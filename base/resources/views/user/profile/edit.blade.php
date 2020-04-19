@extends('layouts.user')

@section('title', '登録情報変更')

@section('content')

    <h1>登録情報変更</h1>

    <!-- show error message.-->
    @if ($errors->any())
        <ul class="error-box">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Success message. -->
    @if (session('status'))
        <p class="info-box">{{ session('status') }}</p>
    @endif

    <form method="POST">
        @csrf
        <ul>
            <li>
                <label>名前</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}">
            </li>
            <li>
                <label>メールアドレス</label>
                <input type="text" name="email" value="{{ old('email', $user->email) }}">
            </li>
        </ul>
        <input type="submit" value="更新する">
    </form>

@endsection
