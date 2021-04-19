<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'name'      =>'required',
            'phone'     =>'required|regex:/(0)[0-9]{9}/|min:6|max:11',
            'first_name'=>'required',
            'last_name' =>'required',
            'state_id'  =>'required',
            'city_id'   =>'required',
            'address'   =>'required',
        ];
    }
}
