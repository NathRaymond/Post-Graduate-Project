<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class SavePermission extends Model implements Auditable {
    use \OwenIt\Auditing\Auditable;
    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'guard_name'
    ];
}
