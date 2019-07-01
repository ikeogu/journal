<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user_role(){
        return $this->belongsTo(User::class);
    }
    protected $fillable=[
        'name','description',
    ];
}
