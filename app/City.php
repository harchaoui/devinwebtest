<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{   
    //Allow Laravel to insert data!
    public $fillable = ['name','slug'];
}
