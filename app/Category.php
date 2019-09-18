<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'name', 'description'
    ];

    public function archive(){
       
        return $this->hasOne('App\Archive');
      
    }
    public function article(){
       
        return $this->hasOne('App\Article');
      
    }
    public function publish(){
       
        return $this->hasOne('App\Publish');
      
    }
}
