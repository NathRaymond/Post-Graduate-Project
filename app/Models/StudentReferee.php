<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReferee extends Model
{
    use HasFactory;
    protected $table = 'student_referees';
    protected $fillable = [
        'title',	
        'surname',
        'firstname',	
        'middlename',
        'post',	
        'address',
        'email',		
        'phone_number',
    ];	
    							
}
