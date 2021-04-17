<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'status'=>'required|in:1,0',
            'size'=>'required',
            'quantity'=>'required',
            'amount'=>'required',
            'payment_method'=>'required|in:COD,AP',
            'sub_total'=>'required',
            'grand_total'=>'required',
        ];
    }
}
