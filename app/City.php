<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{   
    //Allow Laravel to insert data!
    public $fillable = ['name','slug'];
    
    // connect delivery time with city
    public function deliveryTimes() {
        return $this->belongsToMany(DeliveryTime::class);
    }
}
