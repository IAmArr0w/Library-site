<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';

    protected $fillable = ['user_id', 'book_id'];
}
