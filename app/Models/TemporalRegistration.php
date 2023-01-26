<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporalRegistration extends Model
{
    use HasFactory;

    protected $fillable = [

        'first_name', 'last_name','status', 'email', 'session', 'programme', 'type', 'amount'

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
