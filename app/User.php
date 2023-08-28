<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','sex','age','image_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
}
