<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefereeQuestion extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function addeby()
    {
        return $this->belongsTo('App\Models\User', 'added_by')->withDefault(['name' => '']);;
    }
}
