<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductVariantRequest extends Request
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'code'             => 'required|unique:product_variants' ,
                    'name'             => 'required|unique:product_variants',
                    'material'         => '',
                    'color'            => '',
                    'width'            => 'numeric',
                    'depth'            => 'numeric',
                    'price'            => 'required|numeric',
                    'special_price'    => 'numeric',
                    'description'   => '' ,
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'code'             => 'required' ,
                    'name'             => 'required',
                    'material'         => '',
                    'color'            => '',
                    'width'            => 'numeric',
                    'depth'            => 'numeric',
                    'price'            => 'required|numeric',
                    'special_price'    => 'numeric',
                    'description'   => '' ,
                ];
            }
            default:break;
        }
    }
}
