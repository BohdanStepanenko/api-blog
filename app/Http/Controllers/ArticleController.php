<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Http\Requests\ArticleDeleteRequest;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    public function store(ArticleCreateRequest $request)
    {
        $article = Article::create($request->validated());

        return new ArticleResource($article);
    }

    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    public function update(ArticleUpdateRequest $request, Article $article)
    {
        $article->update($request->validated());

        return new ArticleResource($article);
    }

    public function destroy(ArticleDeleteRequest $request, Article $article)
    {
        $article->delete();

        return response()->noContent();
    }
}
