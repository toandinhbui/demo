<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";

    public function Specialized()
    {
        return $this->belongsTo('App\Models\Specialized', 'id_specialized', 'id');
    }
}
