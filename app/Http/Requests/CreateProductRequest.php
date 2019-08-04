<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
          'file' => '',
          'name' => 'required',
          'category' => 'required',
          'price' => 'required',
          'stock' => 'required',
          'description' => 'required',
          'promotionId' => 'required',
          'brandId' => 'required',
        ];
    }
}
