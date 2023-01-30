<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Payment extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $fillable = [

        'payer_name', 'approved_by', 'approved_date', 'fee_id', 'fee_amount', 'amount', 'approval_status', 'transaction_id',
        'file','payment_date','matric_number','applicationRefNo','session','teller_no','receipt_no','bank_name','description','applicant_id'

    ];
}
