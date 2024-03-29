<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreTestimonialRequest extends Request
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
            'name' => 'required|max:50',
            'profession' => 'required|max:25',
            'body' => 'required|max:500',
            'avatar' => 'mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
