<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'surname',
        'firstname',
        'middlename',
        'sex',
        'marital_status',
        'state_of_origin',
        'dob',
        'nationality',
        'religion',
        'phone_number',
        'alt_phone_number',
        'email',
        'alt_email',
    ];

    public function statename()
    {
        return $this->belongsTo('App\Models\State', 'state_of_origin')->withDefault(['name'=> '']);
    }
}
