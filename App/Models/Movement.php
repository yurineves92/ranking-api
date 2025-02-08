<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table = 'movement';
    protected $fillable = ['name'];
    public $timestamps = false;
}
