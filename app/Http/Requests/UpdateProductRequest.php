<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'             => 'required',
            'short_description' => 'required',
            'description'       => 'required',
            'product_image'     => 'mimes:jpg,jpeg,png,bmp',
            'category_id'       => 'required|exists:categories,id',
            'active'            => 'boolean',
        ];
    }
}
