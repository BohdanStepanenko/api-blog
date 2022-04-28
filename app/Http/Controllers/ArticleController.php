<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ArticleCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'text' => $request->text,
            'user_id' => auth()->user()->id
        ]);

        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ArticleUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        $article = Article::find($id);
        $article->slug = null;
        $article->title = $request->title;
        $article->text = $request->text;
        $article->user_id = auth()->user()->id;

        $article->save();

        return response()->json($article, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        // Policy for user to delete only own article
        if (auth()->check()) {
            if (auth()->user()->id === $article->user_id) {
                $article->delete();

                return response()->json('Article deleted successfully', 204);
            }

            return response()->json('You cannot delete someone else`s article', 403);
        }

        return response()->json('Unauthorized', 403);
    }
}
