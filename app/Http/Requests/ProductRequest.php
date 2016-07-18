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
                    'name'          => 'required|unique:products',
                    'category_id'   => 'required' ,
                    'description'   => '' ,
                    'product_variants.code'             => 'required|unique:product_variants' ,
                    'product_variants.name'             => 'required|unique:product_variants',
                    'product_variants.material'         => '',
                    'product_variants.color'            => '',
                    'product_variants.width'            => 'numeric',
                    'product_variants.depth'            => 'numeric',
                    'product_variants.price'            => 'required|numeric',
                    'product_variants.special_price'    => 'numeric'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'          => 'required',
                    'category_id'   => 'required' ,
                    'description'   => '' ,
                ];
            }
            default:break;
        }
    }
}
