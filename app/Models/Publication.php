<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $table = 'student_publications';
    protected $fillable = [
        'student_id',
        'title',	
        'date_published',	
        'duration',	
    ];	
}
