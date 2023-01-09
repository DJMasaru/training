<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class ArticleController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $articles = Article::with("categories")
                            ->orderBy('updated_at', 'desc')
                            ->paginate(10);
        $categories = $this->getValidCategories();

        return view('layouts/index', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View|Factory|Application
     */

    public function show($id): View|Factory|Application
    {
        //show.blade.phpから渡されたidに該当するarticleを見つけ、詳細を表示する
        $article = Article::with("categories")->findOrFail($id);
        $categories = $this->getValidCategories();

        return view('layouts/show')
                ->with([
                    'article' => $article,
                    'categories' => $categories
                ]);
    }

    /**
     * @param int $categoryId
     * @return Application|Factory|View
     */
    public function category(int $categoryId): Application|Factory|View
    {
        $articles = Article::whereHas( 'categories',
            function ($q) use ($categoryId) {
                $q->where('categories.id', '=', $categoryId);
            }
        )->with('categories')
        ->orderBy('updated_at', 'desc')
        ->paginate(10);

        return view('layouts/category')
                ->with([
                    'category' => Category::find($categoryId),
                    'articles' => $articles,
                    'categoryList' => $this->getValidCategories()
                ]);
    }

    /**
     * @return Factory|View|Application
     */
    public function showUncategorized(): Factory|View|Application
    {
        return view('layouts/categoryUncategorized')
                ->with([
                    'articles' => Article::doesntHave('categories')->orderBy('updated_at', 'desc')->Paginate(10),
                    'categoryList' => $this->getValidCategories()
                ]);
    }

    /**
     * Get valid categories which include at least one related article
     * @return Collection
     */
    private function getValidCategories(): Collection
    {
        return Category::with("articles")->has('articles')->get();
    }
}
