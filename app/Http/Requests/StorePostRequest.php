<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PostLimitRule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>['required',
            'string',
            'min:3',
            'max:255',
            Rule::unique('posts')->ignore($this->post)
        ],
            'description'=>'required|string|min:10',
            'user_id'=>['required',
            'exists:users,id',
            new PostLimitRule()
        ],
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages(){
        return [
            'title.required'=>'Title is required',
            'title.string'=>'Title must be a string',
            'title.min'=>'Title must be at least 3 characters',

            'description.required'=>'Description is required',
            'description.string'=>'Description must be a string',
            'description.min'=>'Description must be at least 10 characters',
            
            'user_id.required'=>'Creator is required',
            'user_id.exists'=>'Creator must be a valid user',
            'user_id.unique'=>'Creator must be a unique user',
            
            'image.image'=>'Image must be an image',
            'image.mimes'=>'Image must be a valid image',
            'image.max'=>'Image must be less than 2MB',
        ];
    }
}