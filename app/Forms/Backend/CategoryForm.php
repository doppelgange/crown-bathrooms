<?php

namespace App\Forms\Backend;

use Kris\LaravelFormBuilder\Form;
use App\Category;

class CategoryForm extends Form
{
    public function buildForm()
    {
        $parentCategories = Category::all()->pluck('name','id')->all();
        $this
            ->add('name', 'text')
            ->add('parent_category_id', 'select',[
                'choices'=>$parentCategories,
                'empty_value' => 'Root Category'
            ])
            ->add('description', 'textarea')
            ->add('image', 'file',['rules'=> 'mimes:jpeg,bmp,png'])
            ->add('_save', 'submit', [
                'label' => 'Save',
                'attr' => ['class' => 'btn btn-primary']
            ])
            ->add('_clear', 'reset', [
                'label' => 'Reset',
                'attr' => ['class' => 'btn btn-warning']
            ]);
        ;
    }
}
