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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('title', 3000);
            $table->foreignId('from_id')->constrained('users')->comment('user who is sending the money');
            $table->foreignId('to_id')->constrained('users')->comment('user who will be receiving the money');
            $table->foreignId('razorpay_order_id')->constrained();
            $table->float('amount');
            $table->float('sgst')->comment('in percentage');
            $table->float('cgst')->comment('in percentage');
            $table->float('discount')->comment('in percentage');
            $table->float('final_amount');
            $table->boolean('paid_to_provider')->default(false);
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
        Schema::dropIfExists('invoices');
    }
};
