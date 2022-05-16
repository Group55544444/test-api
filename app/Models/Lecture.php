<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];


    public function listenedClass() {


        return $this->belongsToMany(SchoolClass::class, "listened_classes");
    }
}
