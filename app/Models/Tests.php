<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    protected $table = 'test';

    protected $fillable = [
        'comment',
    ];

    public $primaryKey = 'id';

}
