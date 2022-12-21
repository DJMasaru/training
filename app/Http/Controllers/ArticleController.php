<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $articles = Article::orderBy('created_at', 'desc')->Paginate(10);

        return view('layouts/dashboard', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        // 記事投稿画面を表示
        return view('layouts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //フォームに入力された内容を変数に取得
        $form = $request->all();

        // フォームに入力された内容をデータベースへ登録、まずインスタンスを作る
        $article = new Article();
        $article->fill($form)->save();

        // 記事一覧画面を表示
        return redirect()->route('index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
         //show.blade.phpから渡されたidに該当するarticleを編集する
        $article= Article::find($id);

        return view('layouts/edit')
                ->with('article',$article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $article = Article::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $article->fill($form)->save();

        return redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        //show.blade.phpから渡されたidに該当するarticleを削除する
        $article= Article::find($id);
        $article->delete();

        return redirect(route('index'));
    }
}
