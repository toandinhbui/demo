<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bill";
    
    public function Course()
    {
        return $this->hasOne('App\Models\Courses', 'id_course', 'id');
    }
    public function Student()
    {
        return $this->hasOne('App\Models\Students', 'id_student', 'id');
    }
}
