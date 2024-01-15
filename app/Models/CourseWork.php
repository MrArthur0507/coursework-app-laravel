<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseWork extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'author_id', 'manager_id', 'image_path', 'file_path'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
}
