<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //apakah column name menyatakan username?, jika ya apakah bisa diganti ke username saja?
    protected $fillable = [
        'name', 'email', 'password', 'birthday', 'gender', 'bio', 'user_photo', 'telephone', 'address'
    ];

    protected $dates = ['delete_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token'
    ];


    public function comments(){
        return $this->hasMany('App\Comment', 'comment_by');
    }
     public function create_thread() {
        return $this->hasMany('App\Thread', 'created_by');
    }
}
