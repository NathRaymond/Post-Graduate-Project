<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Fee extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
       
        'type',
        'amount',
        'programme',
        'late_fee',
        'status',
        'description',
        
    ];

    public function services()
    {
        return $this->belongsTo('App\Models\RequestType', 'service')->withDefault(['name' => 'Anonymous']);;
    }

    public function types()
    {
        return $this->belongsTo('App\Models\FeeCategory', 'type')->withDefault(['name' => 'Anonymous']);;
    }

    public function programmes()
    {
        return $this->belongsTo('App\Models\Programmes', 'programme')->withDefault(['name' => 'Anonymous']);;
    }

    public function testinfo()
    {
        return $this->belongsTo('App\TestInfo','test')->withDefault(['name' => 'Anonymous']);;
    }
}
