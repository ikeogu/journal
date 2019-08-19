<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role(){
        return $this->hasOne(Role::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function corr_article()
    {
        return $this->hasMany(CorrArticle::class);
    }

    public function editor(){
        return $this->hasOne(Editor::class);
    }
}
