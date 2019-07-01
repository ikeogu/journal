<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{
    public $table = 'contact_u_s_s';
    public $fillable = ['name','email','message'];
}
