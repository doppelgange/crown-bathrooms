<?php

namespace App\Forms\Backend;

use Kris\LaravelFormBuilder\Form;
use App\Category;

class ProductForm extends Form
{
    public function buildForm()
    {
        $categories = Category::whereNotExists(function ($query) {
                $query->select('*')
                    ->from('categories as parent')
                    ->whereRaw('categories.id = parent.parent_category_id');
            })
            ->pluck('name','id')->all();
        $this
            ->add('name', 'text')
            ->add('code', 'text')
            ->add('category_id', 'choice',[
                'choices'=>$categories,
            ])
            ->add('material', 'text')
            ->add('color', 'text')
            ->add('width', 'number')
            ->add('depth', 'number')
            ->add('price', 'number')
            ->add('special_price', 'number')
            ->add('image', 'file',['rules'=> 'mimes:jpeg,bmp,png'])
            ->add('description', 'textarea')
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
