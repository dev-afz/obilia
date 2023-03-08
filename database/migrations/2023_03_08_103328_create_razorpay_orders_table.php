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
        Schema::create('razorpay_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('order_id');
            $table->float('amount');
            $table->integer('discount')->nullable();
            $table->string('currency');
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('for')->comment('milestone, project, subscription, etc');
            $table->json('for_data')->nullable();
            $table->string('transaction_id')->nullable();
            $table->integer('attempts')->default(0);
            $table->string('resolved_by')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->enum('payment_mode', ['test', 'live'])->default('live');
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
        Schema::dropIfExists('razorpay_orders');
    }
};
