<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $fillable = [
        'user_id','title','detail','category',
    ];

    public function votes()
    {
        return $this->belongsToMany(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function restrict_word($word)
    {
        if(mb_strlen($word) > 18){
            return mb_substr($word,0,18).'...';
        }else{
            return $word;
        }
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
