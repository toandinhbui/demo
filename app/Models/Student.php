<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";

    public function Status()
    {
        return $this->hasMany('App\Models\Status', 'id_status', 'id');
    }
}
