<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //  Make Relations To Tasks
    public function tasks(){
        return this->hasMany(Task::class);
    }
}