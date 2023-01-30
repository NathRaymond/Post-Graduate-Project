<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payer_name');
            $table->string('payer_id');
            $table->string('approved_by');
            $table->string('fee_id');
            $table->decimal('fee_amount', 18, 2);
            $table->decimal('amount', 18, 2);
            $table->date('payment_date');
            $table->date('approved_date');
            $table->string('transaction_id');
            $table->string('approval_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
