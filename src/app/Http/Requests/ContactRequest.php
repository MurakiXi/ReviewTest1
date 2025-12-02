<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'gender'      => 'required|in:1,2,3',
            'email'       => 'required|email',
            'tel_first'   => 'required',
            'tel_second'  => 'required',
            'tel_third'   => 'required',
            'address'     => 'required|string|max:255',
            'building'    => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'detail'      => 'required|string',
        ];
    }
}
