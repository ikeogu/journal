<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    protected $fillable=[
        'salutation', 'fullname','gender','email','position','qualification','current_org',
        'research_area','phone','authored_pub','books_authored','resume','status'
    ];


    public function user_editor(){
        return $this->belongsTo(User::class);
    }
}
