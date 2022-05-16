<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Получить комментарии к посту блога.
     */
    public function students()
    {

        return $this->hasMany(Student::class);
    }

    public function academicPlan() {


        return $this->belongsToMany(Lecture::class, "academic_plans");
    }
}
