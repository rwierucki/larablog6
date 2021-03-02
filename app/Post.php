<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

//    protected $fillable = []; // pola, które można uzupełnić
    protected $guarded = []; // $guarded - przeciwieństwo guardedt
    protected $dates = ['date']; // nazwa pola ktrore ma byc traktowane jak data

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->content), 300);
    }


}
