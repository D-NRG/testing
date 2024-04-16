<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttrRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'manufacture_id'=>'required',
            'product_id'=>'required',
            'color_id'=>'required',
            'size_id'=>'required',
            'categories_id'=>'required',
        ];
    }
}
