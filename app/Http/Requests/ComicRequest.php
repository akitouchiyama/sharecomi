<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comic.title' => 'required|string|max:50',
            'comic.author' => 'required|string|max:50',
            'comic.introduction' => 'required|string|max:300',
            'comic.comment' => 'required|string|max:100',
            'comic.user_id' => 'required'
        ];
    }
}
