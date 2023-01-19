<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layer extends Model
{
    protected $fillable = [
        'name', 'comment', 'outlets_quantity', 'init_date', 'end_date',
    ];
}
