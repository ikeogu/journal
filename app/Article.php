<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'author_name', 'subject_area','category','keywords','publication_edition','email','city','phone',
        'payment_mode','amount','know_us','filename','payment_proof','agree','abstract'
    ];

    public function archive_article(){
       return $this->belongsTo(Archive::class);
    }
}
