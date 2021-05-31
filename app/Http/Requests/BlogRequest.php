<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'bname' => ['required', 'string', 'max:255'],
            'bdesc' => ['required'],
            'bstart_date' => ['required','date_format:Y-m-d'],
            'bend_date' => ['required','date_format:Y-m-d'],
            'image' => ['required','image'],
            'active' => ['in:0,1'],
        ];
    }
}
