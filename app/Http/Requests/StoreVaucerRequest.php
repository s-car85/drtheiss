<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVaucerRequest extends FormRequest
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
            'vaucer_title'    => 'required|max:200',
            'slug'          => 'required| unique:vaucers',
            'vaucer_desc'     => 'required|max:160',
            'vaucer_body'     => 'required|max:10000',
            'vaucer_image'    => 'mimes:jpg,jpeg,png,bmp',
            'vaucer_banner'    => 'mimes:jpg,jpeg,png,bmp'
        ];
    }
}
