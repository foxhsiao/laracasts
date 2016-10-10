<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $articles = \Auth::user()->articles()->latest()->published()->get();

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $tags = Tag::pluck('name', 'id');

        return view('articles.create', compact('tags'));
    }

    /**
     * @param ArticleRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        flash()->success('Your article has ben created');

        return redirect('articles');
    }

    public function edit(Article $article)
    {
        $tags = Tag::pluck('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * @param Article $article
     * @param array   $tags
     *
     * @internal param ArticleRequest $request
     */
    public function syncTags(Article $article, array $tags):void
    {
        $article->tags()->sync($tags);
    }
}
