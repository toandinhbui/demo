<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check_attendance extends Model
{
    protected $table = "check_attendance";

    public function Mentor()
    {
        return $this->hasOne('App\Models\Mentor', 'id_mentor', 'id');
    }
    public function Course()
    {
        return $this->hasOne('App\Models\Courses', 'id_course', 'id');
    }
}
