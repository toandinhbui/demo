<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = "managers";

    public function Role()
    {
        return $this->belongsTo('App\Models\Role', 'id_role', 'id');
    }
}
