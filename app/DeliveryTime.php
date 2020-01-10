<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    //Allow Laravel to insert data!
    public $fillable = ['span'];
}
