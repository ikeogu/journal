<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=[
        'reference','amount','user_id','gateway_response','customer_code','bank','paid_at','status',
    ];

 
    public function userpay(){
     return $this->belongsTo(User::class);
    }

    public function article_pay(){
        return $this->belongsTo(Article::class);
    }
    
}
