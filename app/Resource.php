<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['name','path','type','mime_type'];

    public function getUrlAttribute(){
        return !is_null($this->path)? $this->path:"http://placehold.it/500x500.png";
    }
}
