<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListenedClass extends Model
{
    use HasFactory;

    protected $fillable = ['school_class_id', 'lecture_id'];
}
