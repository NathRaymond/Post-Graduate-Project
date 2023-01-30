<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Programmes extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
       
        'description',
        //'supervisor_name',
       // 'email'
        
    ];
}
