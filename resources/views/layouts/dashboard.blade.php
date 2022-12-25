@extends('layouts.admin')
                    @section('article_list')
                    <div class="panel is-show">
                        <h1>記事一覧</h1>
                            @foreach ($articles as $article)
                                <article class="article">
                                    <a href="{{route('dashboard.show', $article->id)}}">
                                        <p>
                                            @if ($article->created_at == $article->updated_at)
                                                <time datetime="{{Str::limit($article->created_at, 20)}}">登録日時：{{Str::limit($article->created_at, 20, "")}}</time>
                                            @else
                                                <time datetime="{{Str::limit($article->created_at, 20)}}">登録日時：{{Str::limit($article->created_at, 20, "")}}</time>　<time datetime="{{Str::limit($article->updated_at, 20)}}">更新日時：{{Str::limit($article->updated_at, 20, "")}}</time>
                                            @endif
                                        </p>
                                        <h3>{{$article->title}}</h3>
                                        <p>{{$article->content}}</p>
                                    </a>
                                </article>
                            @endforeach
                            {{$articles->links()}}
                    </div>
                    @endsection
                    @section('article_post')
                    <div class="panel">
                        <p>新規投稿</p>
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
                                            <button type="button" onclick="location.href='{{route('dashboard')}}'">戻る</button>
                                        </div>
                                    </li>
                                </ul>
                            </form>
                    </div>
                    @endsection
