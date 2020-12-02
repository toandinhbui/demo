<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_details extends Model
{
    protected $table = "bill_details";
    
    public function Bill()
    {
        return $this->belongsTo('App\Models\Bill', 'id_bill', 'id');
    }
    public function Status_bill()
    {
        return $this->hasMany('App\Models\Courses', 'id_status', 'id');
    }
}
