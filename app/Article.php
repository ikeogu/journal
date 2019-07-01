<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'author_name', 'subject_area','category','keywords','publication_edition','email','city','phone',
        'payment_mode','amount','know_us','filename','reference_code','agree','abstract','user_id',
    ];

    public function archive_article(){
       return $this->belongsTo(Archive::class);
    }

    public function userArt(){
        return $this->belongsTo(User::class);
    }

    public function pay(){
        return $this->hasOne(Payment::class);
    }
}
