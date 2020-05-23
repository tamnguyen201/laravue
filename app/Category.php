<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['categoryName','categoryRank','status'];
    public $timestamps = false;
}
