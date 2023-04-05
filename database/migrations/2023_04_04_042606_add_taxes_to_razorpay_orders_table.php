<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('razorpay_orders', function (Blueprint $table) {
            $table->float('igst')
                ->after('amount')
                ->default(0);
            $table->float('cgst')
                ->after('igst')
                ->default(0);
            $table->json('discount_details')->nullable()->after('discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('razorpay_orders', function (Blueprint $table) {
            //
        });
    }
};
