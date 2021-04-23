<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class InsertAuditTrailingDatesInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dateTime('approve_at')->nullable($value = true)->after('billing_phone');
            $table->dateTime('dr_at')->nullable($value = true)->after('approve_at');
            $table->dateTime('paid_at')->nullable($value = true)->after('dr_at');
            $table->dateTime('released_at')->nullable($value = true)->after('paid_at');
            $table->dateTime('received_at')->nullable($value = true)->after('released_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('approve_at');
            $table->dropColumn('dr_at');
            $table->dropColumn('paid_at');
            $table->dropColumn('released_at');
            $table->dropColumn('received_at');
        });
    }
}
