<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'Contacts';

    protected $fillable = [
      'name','comment','reply','email','subject'
    ];

    static $reply = [
        '必要','不要'
    ];
}
