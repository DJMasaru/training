@extends('layouts.app')

@section('headerCategory')
    <h1>カテゴリー：未分類</h1>
@endsection

@section('content')
    @foreach ($articles->getCollection() as $article)
        <article class="article">
            <a href="{{route('article.show', $article->id)}}">
                <p>
                    @if ($article->created_at === $article->updated_at)
                        <time datetime="{{Str::limit($article->created_at, 20)}}">登録日時：{{Str::limit($article->created_at, 20, "")}}</time>
                    @else
                        <time datetime="{{Str::limit($article->created_at, 20)}}">登録日時：{{Str::limit($article->created_at, 20, "")}}</time>　<time datetime="{{Str::limit($article->updated_at, 20)}}">更新日時：{{Str::limit($article->updated_at, 20, "")}}</time>
                    @endif
                </p>
                <h3>{{$article->title}}</h3>
                <p>{{$article->content}}</p>
                <p>この記事のカテゴリー：未分類</p>
            </a>
        </article>
    @endforeach
    {{$articles->links()}}
@endsection

@section('categoryMenuCategory')
    <div class="categoriesSelect">
        <ul>
            <li>
                記事選択
            </li>
            <li>
                <a href="{{route('index')}}">全件表示</a>
            </li>
            @foreach($categoryList as $category)
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
