<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
   protected $fillable =[
       'title','abstract','author_name','filename','no_pages','authors_email','keywords'
   ];

   public function archive(){
    return $this->belongsTo(Archive::class);
 }
}
