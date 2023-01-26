<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
       
        'type',
        'amount',
        'programme'
        
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
