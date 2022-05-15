<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'age', 'course_number', 'specialty'];

    public function work()
    {
        return $this->hasMany(Work::class, 'student_id', 'id');
    }
}
