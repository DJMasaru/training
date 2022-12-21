@extends('layouts.app')

@section('header')
    <h1>新規投稿</h1>
@endsection

@section('content')
    <form action="{{route('article.store')}}" method="post">
        @csrf
        <ul>
            <li>
                <input type="text" name="title" id="title" placeholder="記事タイトル" required autofocus>
            </li>
            <li>
                <textarea name="content" placeholder="ここに内容を入力してください。" rows="5" required></textarea>
            </li>
            <li>
                <div>
                    <button type="submit">投稿</button><br>
                    <button type="button" onclick="location.href='{{route('article.create')}}'">戻る</button>
                </div>
            </li>
        </ul>
    </form>
@endsection
