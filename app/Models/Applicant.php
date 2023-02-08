<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $table = 'applicants';
    protected $guarded = [];
    // protected $fillable = [
    //     'applicantRefNo',
    //     'first_name',
    //     'last_name',
    //     'middle_name',
    //     'email',
    //     'session',
    //     'programme',
    //     'alt_email',
    //     'type',
    //     'amount',
    //     'phone',
    //     'country',
    //     'state',
    //     'sex',
    //     'marital_status',
    //     'dob',
    //     'religion',
    //     ' mode',
    //     'status',
    //     'is_complete',
    //     'alt_phone_number',
    //     'teller_no',
    //     'is_late',
    //     'description',
    //     'profile_picture',
    // ];

    public function Scount()
    {
        return $this->belongsTo('App\Models\Countries', 'country_id')->withDefault(['name'=> '']);
    }
    public function dProgramme()
    {
        return $this->belongsTo('App\Models\Programmes', 'programme')->withDefault(['name'=> '']);
    }

}
