<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCertificate extends Model
{
    use HasFactory;
    protected $table = 'student_certifcates';
    protected $fillable = [
        'applicant_id',
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

    public function studcount()
    {
        return $this->belongsTo('App\Models\Countries', 'country')->withDefault(['name'=> '']);
    }
    								
}
