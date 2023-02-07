<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class TemporalRegistration extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $table = 'applicants';
    protected $fillable = [

        'first_name', 'last_name','status', 'email', 'session', 'programme', 'type', 'amount','applicantRefNo',
        'is_late','dob','sex','phone','country','state','mode','is_complete','teller_no'

    ];

    public function sessions()
    {
        return $this->belongsTo('App\Models\AcademicSession', 'session')->withDefault(['name' => 'Anonymous']);;
    }

    public function types()
    {
        return $this->belongsTo('App\Models\FeeCategory', 'type')->withDefault(['name' => 'Anonymous']);;
    }

    public function programmes()
    {
        return $this->belongsTo('App\Models\Programmes', 'programme')->withDefault(['name' => 'Anonymous']);;
    }
}
