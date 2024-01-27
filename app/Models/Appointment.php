<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    //names from database
    protected $fillable = [
        'guardianName',
        'guardianEmail',
        'childName',
        'childAge',
        'message',
    ];
}
