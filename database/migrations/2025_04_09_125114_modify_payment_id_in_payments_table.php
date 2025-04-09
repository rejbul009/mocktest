<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPaymentIdInPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Make payment_id nullable or set default value
            $table->string('payment_id')->nullable()->change(); // Or set default value if needed
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Revert the change, making payment_id non-nullable
            $table->string('payment_id')->nullable(false)->change();
        });
    }
}
