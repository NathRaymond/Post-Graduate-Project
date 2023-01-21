<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LGA extends Model
{
    protected $table = 'local_govt';

    protected $fillable = [

        'state_id', 'local_govt', 'id_no'

    ];
}
