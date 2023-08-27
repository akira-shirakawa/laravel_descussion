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
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public static function convert_category($id)
    {
        if($id == 1){
            return 'ビジネスマナー';
        }elseif($id == 2){
            return '冠婚葬祭';
        }elseif($id == 3){
            return '食事';
        }elseif($id == 4){
            return '乗り物';
        }elseif($id == 5){
            return 'その他';
        }
    }

    
}
