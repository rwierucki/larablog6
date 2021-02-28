<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

//    protected $fillable = []; // pola, które można uzupełnić
    protected $guarded = []; // $guarded - przeciwieństwo guardedt
}
