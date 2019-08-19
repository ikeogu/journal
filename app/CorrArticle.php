<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorrArticle extends Model
{
   protected $table = [
    'user_id',
    'title',
    'author_name',
    'subject_area',
    'category',
    'abstract',
    'keywords',
    'publication_edition',
    'email',

    'phone',
    'payment_mode',
    'amount',

    'filename',
    'customer_code'


   ];

   public function user(){
       return $this->belongsTo(User::class);
   }

   public function pay(){
    return $this->hasOne(Payment::class);
}
}
