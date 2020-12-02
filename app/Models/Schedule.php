<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = "Schedules";

    public function Student()
    {
        return $this->hasOne('App\Models\Student', 'id_student', 'id');
    }
    public function Mentor()
    {
        return $this->hasOne('App\Models\Mentor', 'id_mentor', 'id');
    }
    public function Course()
    {
        return $this->belongsTo('App\Models\Course', 'id_course', 'id');
    }
}