<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOLevel extends Model
{
    use HasFactory;
    protected $table = 'student_o_levels';
    protected $fillable = [
        'student_id',	
        'subject_id',	
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
    				
}
