<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $table = "mentors";

    public function Specialized()
    {
        return $this->hasMany('App\Models\Specialized', 'id_specialized', 'id');
    }
}
