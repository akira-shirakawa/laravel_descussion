<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id','title','detail','category',
    ];

    public function votes()
    {
        return $this->belongsToMany('App\User');
    }

    

    
}
