<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHomeAdd extends Model
{
    use HasFactory;
    protected $table = 'student_home_adds';
    protected $fillable = [
        'student_id',	
        'state',
        'country_id',	
        'town',
        'street',
    ];
}				