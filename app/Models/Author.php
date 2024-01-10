<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'bio'];

    public function courses()
    {
        return $this->hasMany(CourseWork::class);
    }
}
