<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   
        
        return [
            'title'=> "bail|required|unique:post,title,{$this->input('id')}",
            'body'=>'required',
            'author'=>'required',
        ];
    }

    public function messages(){
        return [
            'title.required'=> 'mandatory field',
            'body.required'=> 'mandatory field',
            'author.required'=> 'mandatory field',
        ];
    }
}
