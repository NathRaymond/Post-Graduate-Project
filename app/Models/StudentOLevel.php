<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOLevel extends Model
{
    use HasFactory;
    protected $table = 'student_o_levels';
    protected $fillable = [
        'applicant_id',		
        'subject_id',	
        'exam_type',
        'grade',	
        'year',
        'reg_number',
    ];

    public function sub()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id')->withDefault(['name'=> '']);
    }

    public function subject(){
        $student = StudentOLevel::where('applicant_id', $this->applicant_id)->where('exam_type', $this->exam_type)->get();
        return $student;
    }
    				
}
