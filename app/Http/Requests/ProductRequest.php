<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            // 'description'   =>'required',
            'category' => 'required',
            'images' => 'required',
            'product_number' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }

    public function messages()
    {
        return [
            // 'brand.required'        =>'Product brand is required',
            // 'brand.integer'         =>'Product brand is required',
            // 'color.required'        =>'Product color is required',
            'price.required' => 'Product price is required',
            'description.required' => 'Product description is required',
            'category.required' => 'Product category is required',
            'product_number.required' => 'Product Number is required'
            // 'size.required'         =>'Product size is required',
            // 'metal.required'         =>'Product metal type is required',
            // 'width.required'         =>'Product width is required',
            // 'prong_metal.required'         =>'Product prong metal type is required',
        ];
    }
}
