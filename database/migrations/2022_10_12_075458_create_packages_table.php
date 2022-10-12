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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('duration')->nullable();
            $table->float('price');
            $table->float('discount', 3, 2)->default(0);
            $table->enum('is_popular', ['yes', 'no'])->default('no');
            $table->enum('is_subscription', ['yes', 'no'])->default('no');
            $table->enum('for', ['individual', 'agency'])->default('individual');
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('packages');
    }
};
