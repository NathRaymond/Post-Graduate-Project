<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHomeAdd extends Model
{
    use HasFactory;
    protected $table = 'student_home_adds';
    protected $fillable = [
        'applicant_id',	
        'hom_state',
        'hom_country_id',	
        'hom_town',
        'hom_street',
    ];
    public function hState()
    {
        return $this->belongsTo('App\Models\State', 'hom_state')->withDefault(['name'=> '']);
    }
    public function Hcount()
    {
        return $this->belongsTo('App\Models\Countries', 'hom_country_id')->withDefault(['name'=> '']);
    }
}				