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


        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->enum('payment_type', ['fixed', 'hourly']);
            $table->float('work_hours')->nullable();
            $table->enum('size', ['small', 'medium', 'large']);
            $table->enum('visibility', ['public', 'private', 'hidden'])->default('public');
            $table->string('country');
            $table->float('rate_from');
            $table->float('rate_to');
            $table->foreignId('experience_level_id')->nullable()->constrained('experience_levels')->nullOnDelete();
            $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->nullOnDelete();
            $table->string('metadata', 500)->nullable();
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
        Schema::dropIfExists('jobs');
    }
};
