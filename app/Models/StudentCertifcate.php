<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCertifcate extends Model
{
    use HasFactory;
    protected $table = 'student_certifcates';
    protected $fillable = [
        'school',
        'matric_number',
        'country',
        'town',
        'year',
        'date_obtained',
        'class_of_degree',
        'certificate',
        'cgpa',
    ];
    								
}
