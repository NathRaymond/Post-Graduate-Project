<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [

        'name',
        'head',
        'image'

    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'head')->withDefault(['name' => '']);;
    }
}
