<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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
        if ($this->isMethod('post')) {
            return [
                'parent_category_id'  => 'exists:categories,id',
                'name'      => 'required|unique:categories|max:255',
                'code'      => 'required|unique:categories|max:255',
            ];
        }else{
            return [
                'parent_category_id'  => 'exists:categories,id',
                'name'      => 'required|max:255',
                'code'      => 'required|max:255',
            ];
        }

    }
}
