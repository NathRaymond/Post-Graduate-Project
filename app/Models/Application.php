<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Application extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = [
    //     'applicant_email',
    //     'applicant_id',
    //     'status',
    //      'session_id',
    //      'course_id',
    //      'program_id',
    //      'applicationRefNo',
    //     'payment_status',
    //     'semester',
    //     'accept_declaration',
    //     'nationality',
    //     'isRecommended',
    //     'is_late',
    //     'teller_no',
    //     'type',
    //     'amount'

    // ];

    public function sessions()
    {
        return $this->belongsTo('App\Models\AcademicSession', 'session_id')->withDefault(['name' => 'Anonymous']);;
    }

    public function types()
    {
        return $this->belongsTo('App\Models\FeeCategory', 'type')->withDefault(['name' => 'Anonymous']);;
    }

    public function programmes()
    {
        return $this->belongsTo('App\Models\Programmes', 'program_id')->withDefault(['name' => 'Anonymous']);;
    }

     public function appsession()
    {
        return $this->belongsTo('App\Models\Programmes', 'session_id')->withDefault(['name' => ' ']);;
    }

    public function applicant()
    {
        return $this->belongsTo('App\Models\Applicant', 'applicant_id')->withDefault(['name' => ' ']);;
    }
    public function Course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id')->withDefault(['name' => ' ']);;
    }
}
