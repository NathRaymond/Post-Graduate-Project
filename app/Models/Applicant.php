<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $table = 'applicants';
    protected $fillable = [
        'applicantRefNo',
        'surname',
        'firstname',
        'middlename',
        'email',
        'session',
        'programme',
        'alt_email',
        'type',
        'amount',
        'phone_number',
        'country',
        'state',
        'sex',
        'marital_status',
        'dob',
        'religion',
        ' mode',
        'status',
        'is_complete',
        'alt_phone_number',
        'teller_no',
        'is_late',
        'description',
    ];
}
