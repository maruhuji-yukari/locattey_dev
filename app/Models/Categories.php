<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'category_name',
    ];

    public $primaryKey = 'categories.id';

    public function product(){
        return $this->hasMany('App\Models\Categories')->orderBy('id','DESC');
    }

}
