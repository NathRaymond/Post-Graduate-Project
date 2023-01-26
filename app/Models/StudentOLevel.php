<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOLevel extends Model
{
    use HasFactory;
    protected $table = 'student_o_levels';
    protected $fillable = [
        'subject_id',	
        'exam_type',
        'grade',	
        'year',
        'reg_number',
    ];
    				
}
