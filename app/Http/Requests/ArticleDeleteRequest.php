<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Article;

class ArticleDeleteRequest extends FormRequest
{
    public function authorize()
    {
        $article_id = $this->route('article')->id;
        $article = Article::where('id', '=', $article_id)->first();

        return auth()->user()->is_admin && auth()->user()->id === $article->user_id;
    }

    public function rules()
    {
        return [];
    }
}
