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
        Schema::create('usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->morphs('usageable');
            $table->text('remark')->nullable();
            $table->integer('usage')->default(0);
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
        Schema::dropIfExists('usages');
    }
};
