{{--このファイルはapp.blade.phpに出力されている。--}}
{{--具体的には、このファイルの@section等がapp.blade.phpの@yieldに埋め込まれている。--}}
{{--つまりスケルトン（雛形）がapp.blade.phpで、インスタンス（具体的なデータ群）がこのファイルにあたる。--}}
@extends('layouts.app')

@section('header')
    <h1>{{$article->title}}</h1>
@endsection

@section('content')
    <p>{{$article->content}}</p>
    @if(count($article->categories) > 0)
        <p>この記事のカテゴリー：{{$article->categories->implode('label')}}</p>
    @endif
    <ul id="blog-menu">
        <li>
            <a href="{{route('index')}}" class="btn">戻る</a>
        </li>
    </ul>
@endsection

@section('categoryMenu')
    <div class="categoriesSelect">
        <ul>
            <li>
                記事選択
            </li>
            <li>
                <a href="{{route('index')}}">全件表示</a>
            </li>
            @foreach($categories as $category)
                <li>
                    <a href="{{route('article.category', $category->id)}}">{{$category->label}}</a>
                </li>
            @endforeach
            <li>
                <a href="{{route('article.category.uncategorized')}}">未分類</a>
            </li>
        </ul>
    </div>
@endsection
