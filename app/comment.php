<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use auth;
class Comment extends Model
{
    protected $fillable = [
        'comment',
        'user_id',
        'article_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function get_user_image($age,$sex)
    {
        if($age == 1 && $sex == 1){
            return 'user_images/user1.png';
        }elseif($age == 2 && $sex == 1){
            return 'user_images/user2.png';
        }elseif($age == 3 && $sex == 1){
            return 'user_images/user3.png';
        }elseif($age == 1 && $sex == 2){
            return 'user_images/user4.png';
        }elseif($age == 2 && $sex == 2){
            return 'user_images/user5.png';
        }elseif($age == 3 && $sex == 2){
            return 'user_images/user6.png';
        }

            

    }
    public function convert_age($age)
    {
        if($age == 1){
            return '25歳以下';
        }elseif($age == 2){
            return '26~45歳';
        }elseif($age == 3){
            return '46歳以上';
        }
    }
    public function convert_sex($sex)
    {
        if($sex == 1){
            return '男性';
        }elseif($sex == 2){
            return '女性';
        }
    }
    public function get_like()
    {
        $count = $this->users()->count();
        return $count;
    }
    public function is_liked()
    {
        if(Auth::check())
        {
        $liked = $this->users()->where('users.id', auth::user()->id)->exists();
        return $liked;
        }
    }
}
