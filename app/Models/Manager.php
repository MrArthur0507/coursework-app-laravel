<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'department'];

    public function courses()
    {
        return $this->hasMany(CourseWork::class);
    }
}
