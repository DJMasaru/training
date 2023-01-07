@extends('layouts.admin')

@section('article.list')
    <h1>記事編集</h1>
@endsection

@section('article.post')
    <div class="edit_form">
        <form action="{{route('dashboard.article.update', $article->id)}}" method="post">
                @method('PATCH')
                @csrf
            <ul>
                <li>
                    <input type="text" name="title" id="title" placeholder="記事タイトル" value="{{$article->title}}" required autofocus>
                </li>
                <li>
                    <textarea name="content" placeholder="ここに内容を入力してください。" rows="5" required>{{$article->content}}</textarea>
                </li>
                <li>
                    <div class="edit_button">
                        <button type="submit" >更新</button><br>
                        <button type="button" onclick="location.href='{{url()->previous()}}'">戻る</button>
                    </div>
                </li>
            </ul>
            <select name="categoryId">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->label}}</option>
                @endforeach
            </select>
        </form>
    </div>
@endsection
