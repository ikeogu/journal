<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
   protected $fillable = [ 'cover_page_front',
     'cover_page_back','description', 'subtitle',
     
     'title',];

     public function articles(){
        return $this->hasMany(Article::class);
     }

     public function table_of_contents(){
        return $this->hasOne(Table_Of_Content::class);
    }

    public function archive_pub(){
        return $this->hasMany(Publish::class);
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
