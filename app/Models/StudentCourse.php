<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;
    protected $table = 'student_courses';
    protected $fillable = [
        'student_id',	
        'dept_id',	
        'prog_id',	
        'course_id',	
        'mode_of_study',	
    ];	

    public function descrip()
    {
        return $this->belongsTo('App\Models\Department', 'dept_id')->withDefault(['name'=> '']);
    }
    public function prog()
    {
        return $this->belongsTo('App\Models\Programmes', 'prog_id')->withDefault(['name'=> '']);
    }
    public function cour()
    {
        return $this->belongsTo('App\Models\Course', 'course_id')->withDefault(['name'=> '']);
    }
    public function dProgramme()
    {
        return $this->belongsTo('App\Models\Programmes', 'prog_id')->withDefault(['name'=> '']);
    }
}
