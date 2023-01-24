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
}
