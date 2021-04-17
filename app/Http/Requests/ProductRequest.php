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
            'name'          =>'required|unique:products,name',
            'brand'         =>'required',
            'price'         =>'required|integer',
            'stock'         =>'required|integer',
            // 'description'   =>'required',
            'category'      =>'required',
            'color'         =>'required',
            'size'          =>'required',
            // 'tags'          =>'required',
            'images'        =>'required',
            'images.*'      =>'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
    public function messages()
    {
        return [
            'brand.required'        =>'Product brand is required',
            'brand.integer'         =>'Product brand is required',
            'color.required'        =>'Product color is required',
            'price.required'        =>'Product price is required',
            'description.required'  =>'Product description is required',
            'category.required'     =>'Product category is required',
            'size.required'         =>'Product size is required',
        ];
    }
}
