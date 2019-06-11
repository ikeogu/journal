<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table_Of_Content extends Model
{
    protected $fillable = [
        'title','page_no',
    ];

    public function archive(){
        return $this->belongsTo(Archive::class);
    }
}
