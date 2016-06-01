<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'name'  => 'required',
            'code'  => 'required' ,
            'category_id'  => 'required' ,
//            'material',
//            'description',
//            'color' ,
            'width' =>'numeric',
            'depth' =>'numeric',
            'price' =>'required|numeric',
            'special_price' =>'numeric'
        ];
    }
}
