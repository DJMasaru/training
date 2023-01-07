@extends('layouts.admin')

@section('article.post')
    <div class="article_detail">
        <h1>{{$article->title}}</h1>
        <p>{{$article->content}}</p>
        <?php $categoryLabels = $article->categories->pluck( 'label' ) ?>
        <?php if (!empty($categoryLabels)){  ?>
        <p>{{$article->categories->implode('label')}}</p>
         <?php }?>
        <ul>
            <li>
                <a href="{{route('dashboard.article.edit', $article->id)}}" class="btn">編集</a>
            </li>
            <li>
                <form action="{{route('dashboard.article.destroy', $article->id)}}" method="post" onsubmit="return confirm('ほんまに消してええんか？')">
                @method('delete')
                @csrf
                <button type="submit" class="btn">削除</button>
                </form>
            </li>
            <li>
                <button type="button" class="btn" onclick="location.href='{{url()->previous()}}'">戻る</button>
            </li>
        </ul>
    </div>
@endsection
