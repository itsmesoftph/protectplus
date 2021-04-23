<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertShippingInfoInTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('shipping_fullname')->after('email');
            $table->string('shipping_address')->after('shipping_fullname');
            $table->string('shipping_phone')->after('shipping_address');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('shipping_fullname');
            $table->dropColumn('shipping_address');
            $table->dropColumn('shipping_address');

        });
    }
}
