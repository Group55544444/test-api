<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListenedLecture extends Model
{
    use HasFactory;

    protected $fillable = ['has_listen', 'student_id', 'lecture_id'];



}
