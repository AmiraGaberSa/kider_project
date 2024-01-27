<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Subject extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'age',
        'time',
        'capacity',
        'cost',
        'image',
        'published',
        'teacher_id'

    ];

    public function teacher()
    {
        
        return $this->belongsTo(Teacher::class);
    }
}
