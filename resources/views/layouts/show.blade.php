@extends('layouts.app')

@section('header')
    <h1>{{$article->title}}</h1>
@endsection

@section('content')
    <p>{{$article->content}}</p>
    <ul id="blog-menu">
        <li>
            <a href="{{route('article.edit', $article->id)}}" class="btn">編集</a>
        </li>
        <li>
            <form action="{{route('article.destroy', $article->id)}}" method="post" onsubmit="return confirm('ほんまに消してええんか？')">
                @method('delete')
                @csrf
                <button type="submit" class="btn">削除</button>
            </form>
        </li>
        <li>
            <a href="{{route('index')}}" class="btn">戻る</a>
        </li>
    </ul>
    <div id="show">
        {{-- {!! Str::markdown($article->content) !!} --}}
    </div>
@endsection
