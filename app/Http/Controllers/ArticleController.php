<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $articles = Article::orderBy('updated_at', 'desc' ,'created_at', 'desc')->Paginate(10);

        return view('layouts/index', ['articles' => $articles]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */

    public function show($id): View|Factory|Application
    {
        //show.blade.phpから渡されたidに該当するarticleを見つけ、詳細を表示する
        $article = Article::findOrFail($id);

        return view('layouts/show')
            ->with(['article' => $article]);
    }
}
