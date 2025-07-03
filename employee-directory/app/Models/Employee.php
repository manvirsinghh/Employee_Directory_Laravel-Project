<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=['name','email','department_id'];
    function department(){
        return $this->belongsTo(Department::class);
    }
}
