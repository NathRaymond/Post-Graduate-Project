<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAppointment extends Model
{
    use HasFactory;
    protected $table = 'student_appointments';
    protected $fillable = [
        'student_id',
        'employer',	
        'post',	
        'duration',	
    ];	
}
