<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentContact extends Model
{
    use HasFactory;
    protected $table = 'student_contacts';
    protected $fillable = [
        'applicant_id',	
        'cont_email',
        'cont_country_id',	
        'cont_state',
        'cont_city'	,
        'cont_c_o',		
    ];	

    public function SState()
    {
        return $this->belongsTo('App\Models\State', 'hom_state')->withDefault(['name'=> '']);
    }
    public function Scount()
    {
        return $this->belongsTo('App\Models\Countries', 'cont_country_id')->withDefault(['name'=> '']);
    }
}
