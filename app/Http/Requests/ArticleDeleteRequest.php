<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleDeleteRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->is_admin;
    }
    public function rules()
    {
        return [];
    }
}
