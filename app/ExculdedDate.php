<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExculdedDate extends Model
{
    public $fillable =['delivery_time_id',
'city_id',
'date'   ,
'name'   ];
}
