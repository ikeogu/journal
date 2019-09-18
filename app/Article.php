<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'author_name', 'subject_area','category','keywords','publication_edition','email','city','phone',
        'amount','know_us','filename','agree','abstract','user_id',
    ];

    public function archive_article(){
       return $this->belongsTo(Archive::class);
    }

    public function corr_article(){
        return $this->hasOne(CorrArticle::class);
     }

    public function userArt(){
        return $this->belongsTo(User::class);
    }

    public function artCat(){
        return $this->belongsTo(Category::class);
    }
}
