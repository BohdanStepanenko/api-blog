<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;
use App\Models\Article;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return new ArticleResource($article);
    }

    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return new ArticleResource($article);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json('Article deleted successfully', Response::HTTP_NO_CONTENT);
    }
}
